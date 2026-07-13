/**
 * Azytus Toolkit - Admin Scripts
 */

(function($) {
    'use strict';
    
    $(document).ready(function() {
        
        // Initialize Select2
        if ($.fn.select2) {
            $('.azytus-select2').select2({
                placeholder: function() {
                    return $(this).find('option:first').text();
                },
                allowClear: true,
                width: '100%'
            });
        }
        
        // Initialize Sortable for Grades
        initGradesSortable();
        
        // Initialize Sortable for existing Pack Sizes
        initAllPackSizesSortable();
        
        // File Upload Handler
        var azytusMediaFrame;
        var currentFieldElement;
        
        $(document).on('click', '.azytus-upload-button', function(e) {
            e.preventDefault();
            
            var button = $(this);
            var fileType = button.data('file-type') || 'pdf';
            currentFieldElement = button.closest('.azytus-file-upload').find('input[type="hidden"]');
            
            if (azytusMediaFrame) {
                azytusMediaFrame.close();
                azytusMediaFrame = null;
            }
            
            var mediaOptions = {
                title: fileType === 'image' ? 'Select or Upload Image' : 'Select or Upload PDF',
                button: {
                    text: 'Use this file'
                },
                multiple: false
            };
            
            if (fileType === 'image') {
                mediaOptions.library = { type: 'image' };
            } else {
                mediaOptions.library = { type: 'application/pdf' };
            }
            
            // Create a new media frame
            azytusMediaFrame = wp.media(mediaOptions);
            
            // When a file is selected, run a callback
            azytusMediaFrame.on('select', function() {
                var attachment = azytusMediaFrame.state().get('selection').first().toJSON();
                
                // Set the hidden field value
                currentFieldElement.val(attachment.id);
                
                var previewHtml;
                if (fileType === 'image') {
                    var imageUrl = attachment.sizes && attachment.sizes.medium
                        ? attachment.sizes.medium.url
                        : attachment.url;
                    previewHtml = '<img src="' + imageUrl + '" alt="" style="max-width: 200px; height: auto;" />';
                } else {
                    previewHtml = '<a href="' + attachment.url + '" target="_blank" class="azytus-file-link">' +
                                '<span class="dashicons dashicons-media-document"></span>' +
                                attachment.filename +
                                '</a>';
                }
                
                currentFieldElement.siblings('.azytus-file-preview').html(previewHtml);
                currentFieldElement.siblings('.azytus-remove-button').show();
                
                azytusMediaFrame = null;
            });
            
            // Open the media frame
            azytusMediaFrame.open();
        });
        
        // File Remove Handler
        $(document).on('click', '.azytus-remove-button', function(e) {
            e.preventDefault();
            
            var button = $(this);
            var fileUpload = button.closest('.azytus-file-upload');
            
            fileUpload.find('input[type="hidden"]').val('');
            fileUpload.find('.azytus-file-preview').html('');
            button.hide();
        });
        
        // ========== PRODUCT GRADES - REPEATABLE FIELDS ==========
        
        // Add Grade
        $(document).on('click', '.azytus-add-grade', function(e) {
            e.preventDefault();
            
            var container = $('#azytus-grades-container');
            var template = $('#azytus-grade-template').html();
            var index = container.find('.azytus-grade-row').length;
            
            var newRow = template.replace(/{{INDEX}}/g, index).replace(/{{INDEX_PLUS_1}}/g, (index + 1));
            container.append(newRow);
            
            // Initialize sortable for the new grade's pack sizes
            var newGrade = container.find('.azytus-grade-row').last();
            var packSizesContainer = newGrade.find('.azytus-pack-sizes-container');
            initPackSizesSortable(packSizesContainer);
            
            // Initialize Select2 on new grade category dropdown
            if ($.fn.select2) {
                newGrade.find('.azytus-grade-category-select').select2({
                    placeholder: 'Select a grade category...',
                    allowClear: true,
                    width: '100%'
                });
            }
            
            updateGradeNumbers();
        });
        
        // Remove Grade
        $(document).on('click', '.azytus-remove-grade', function(e) {
            e.preventDefault();
            
            var gradeRow = $(this).closest('.azytus-grade-row');
            
            if ($('#azytus-grades-container .azytus-grade-row').length > 1) {
                gradeRow.remove();
                updateGradeNumbers();
                reindexGrades();
            } else {
                alert('At least one grade is required.');
            }
        });
        
        // Add Pack Size via faded "Add Pack" card
        $(document).on('click', '.azytus-add-pack-button', function(e) {
            e.preventDefault();
            addPackSizeToContainer($(this));
        });
        
        // Add Pack Size via inline + button on each card
        $(document).on('click', '.azytus-add-pack-inline', function(e) {
            e.preventDefault();
            var addCard = $(this).closest('.azytus-pack-sizes-container').find('.azytus-add-pack-button');
            addPackSizeToContainer(addCard);
        });
        
        function addPackSizeToContainer(addButton) {
            var gradeIndex = addButton.data('grade-index');
            var container = addButton.closest('.azytus-pack-sizes-container');
            var template = $('#azytus-pack-size-template').html();
            var packIndex = container.find('.azytus-pack-size-row').length;
            
            var newRow = template.replace(/{{GRADE_INDEX}}/g, gradeIndex).replace(/{{PACK_INDEX}}/g, packIndex);
            
            // Insert before the "Add Pack" card
            addButton.before(newRow);
            
            // Focus the new input
            addButton.prev('.azytus-pack-size-row').find('input[type="text"]').focus();
            
            // Reinitialize sortable for this container
            if (container.hasClass('ui-sortable')) {
                container.sortable('destroy');
            }
            initPackSizesSortable(container);
        }
        
        // Remove Pack Size
        $(document).on('click', '.azytus-remove-pack-size', function(e) {
            e.preventDefault();
            
            var packSizeRow = $(this).closest('.azytus-pack-size-row');
            var container = packSizeRow.closest('.azytus-pack-sizes-container');
            
            if (container.find('.azytus-pack-size-row').length > 1) {
                packSizeRow.remove();
                reindexPackSizes(container);
            } else {
                alert('At least one pack size is required.');
            }
        });
        
        // Update grade numbers
        function updateGradeNumbers() {
            $('#azytus-grades-container .azytus-grade-row').each(function(index) {
                $(this).find('.grade-number').text(index + 1);
            });
        }
        
        // Reindex grades after removal
        function reindexGrades() {
            $('#azytus-grades-container .azytus-grade-row').each(function(gradeIndex) {
                $(this).attr('data-index', gradeIndex);
                
                // Update grade field names
                $(this).find('input[name*="azytus_grades"], select[name*="azytus_grades"]').each(function() {
                    var name = $(this).attr('name');
                    name = name.replace(/azytus_grades\[\d+\]/, 'azytus_grades[' + gradeIndex + ']');
                    $(this).attr('name', name);
                });
                
                // Update pack size container index
                var packSizeContainer = $(this).find('.azytus-pack-sizes-container');
                packSizeContainer.attr('data-grade-index', gradeIndex);
                
                // Update add pack button data-grade-index
                $(this).find('.azytus-add-pack-button').attr('data-grade-index', gradeIndex);
                $(this).find('.azytus-add-pack-inline').attr('data-grade-index', gradeIndex);
                
                // Reindex pack sizes within this grade
                reindexPackSizes(packSizeContainer);
            });
        }
        
        // Reindex pack sizes within a grade
        function reindexPackSizes(container) {
            var gradeIndex = container.data('grade-index');
            container.find('.azytus-pack-size-row').each(function(packIndex) {
                $(this).attr('data-pack-index', packIndex);
                $(this).find('input').attr('name', 'azytus_grades[' + gradeIndex + '][pack_sizes][' + packIndex + '][pack_size]');
            });
        }
        
        // ========== COA/BATCH - REPEATABLE FIELDS ==========
        
        // Add Batch
        $(document).on('click', '.azytus-add-batch', function(e) {
            e.preventDefault();
            
            var container = $('#azytus-batches-container');
            var template = $('#azytus-batch-template').html();
            var index = container.find('.azytus-batch-row').length;
            
            var newRow = template.replace(/{{INDEX}}/g, index).replace(/{{INDEX_PLUS_1}}/g, (index + 1));
            container.append(newRow);
            
            updateBatchNumbers();
        });
        
        // Remove Batch
        $(document).on('click', '.azytus-remove-batch', function(e) {
            e.preventDefault();
            
            var batchRow = $(this).closest('.azytus-batch-row');
            
            if ($('#azytus-batches-container .azytus-batch-row').length > 1) {
                batchRow.remove();
                updateBatchNumbers();
                reindexBatches();
            } else {
                alert('At least one batch is required.');
            }
        });
        
        // Update batch numbers
        function updateBatchNumbers() {
            $('#azytus-batches-container .azytus-batch-row').each(function(index) {
                $(this).find('.batch-number').text(index + 1);
            });
        }
        
        // Reindex batches after removal
        function reindexBatches() {
            $('#azytus-batches-container .azytus-batch-row').each(function(batchIndex) {
                $(this).attr('data-index', batchIndex);
                
                // Update batch field names
                $(this).find('input[name*="azytus_batches"], input[class*="azytus-coa-field"]').each(function() {
                    var name = $(this).attr('name');
                    if (name) {
                        name = name.replace(/azytus_batches\[\d+\]/, 'azytus_batches[' + batchIndex + ']');
                        $(this).attr('name', name);
                    }
                });
                
                // Update upload button data-field
                $(this).find('.azytus-upload-button').each(function() {
                    var dataField = $(this).data('field');
                    if (dataField) {
                        dataField = dataField.replace(/azytus_batches\[\d+\]/, 'azytus_batches[' + batchIndex + ']');
                        $(this).attr('data-field', dataField);
                    }
                });
                
                // Update remove button data-field
                $(this).find('.azytus-remove-button').each(function() {
                    var dataField = $(this).data('field');
                    if (dataField) {
                        dataField = dataField.replace(/azytus_batches\[\d+\]/, 'azytus_batches[' + batchIndex + ']');
                        $(this).attr('data-field', dataField);
                    }
                });
            });
        }
        
        // ========== COA/BATCH - DYNAMIC SELECTS ==========
        
        // Product change handler
        $(document).on('change', '#azytus_product_id.azytus-coa-product-select', function() {
            var productId = $(this).val();
            var gradeSelect = $('#azytus_grade_index');
            var packSizeSelect = $('#azytus_pack_size_index');
            
            if (!productId) {
                gradeSelect.html('<option value="">Select a grade...</option>').trigger('change');
                packSizeSelect.html('<option value="">Select a pack size...</option>').trigger('change');
                return;
            }
            
            // Load grades via AJAX
            $.ajax({
                url: azytusAdmin.ajax_url,
                type: 'POST',
                data: {
                    action: 'azytus_get_product_grades',
                    product_id: productId,
                    nonce: azytusAdmin.nonce
                },
                beforeSend: function() {
                    gradeSelect.prop('disabled', true);
                },
                success: function(response) {
                    if (response.success) {
                        var options = '<option value="">Select a grade...</option>';
                        $.each(response.data, function(index, item) {
                            options += '<option value="' + item.index + '">' + item.text + '</option>';
                        });
                        gradeSelect.html(options).trigger('change');
                    }
                },
                complete: function() {
                    gradeSelect.prop('disabled', false);
                }
            });
            
            // Clear pack size
            packSizeSelect.html('<option value="">Select a pack size...</option>').trigger('change');
        });
        
        // Grade change handler
        $(document).on('change', '#azytus_grade_index.azytus-coa-grade-select', function() {
            var productId = $('#azytus_product_id').val();
            var gradeIndex = $(this).val();
            var packSizeSelect = $('#azytus_pack_size_index');
            
            if (!productId || gradeIndex === '') {
                packSizeSelect.html('<option value="">Select a pack size...</option>').trigger('change');
                return;
            }
            
            // Load pack sizes via AJAX
            $.ajax({
                url: azytusAdmin.ajax_url,
                type: 'POST',
                data: {
                    action: 'azytus_get_grade_pack_sizes',
                    product_id: productId,
                    grade_index: gradeIndex,
                    nonce: azytusAdmin.nonce
                },
                beforeSend: function() {
                    packSizeSelect.prop('disabled', true);
                },
                success: function(response) {
                    if (response.success) {
                        var options = '<option value="">Select a pack size...</option>';
                        $.each(response.data, function(index, item) {
                            options += '<option value="' + item.index + '">' + item.text + '</option>';
                        });
                        packSizeSelect.html(options).trigger('change');
                    }
                },
                complete: function() {
                    packSizeSelect.prop('disabled', false);
                }
            });
        });
        
        // Form validation
        $('form#post').on('submit', function(e) {
            var requiredFields = $(this).find('[required]');
            var hasError = false;
            
            requiredFields.each(function() {
                if (!$(this).val()) {
                    hasError = true;
                    $(this).css('border-color', '#dc3232');
                } else {
                    $(this).css('border-color', '');
                }
            });
            
            if (hasError) {
                e.preventDefault();
                alert('Please fill in all required fields.');
                $('html, body').animate({
                    scrollTop: $('.azytus-meta-box').offset().top - 100
                }, 500);
            }
        });
        
        // Clear error styling on input
        $('[required]').on('input change', function() {
            if ($(this).val()) {
                $(this).css('border-color', '');
            }
        });
    });
    
    // ========== SORTABLE INITIALIZATION ==========
    
    /**
     * Initialize sortable for grades
     */
    function initGradesSortable() {
        if ($.fn.sortable) {
            $('#azytus-grades-container').sortable({
                handle: '.azytus-grade-drag-handle',
                placeholder: 'ui-sortable-placeholder',
                helper: 'clone',
                opacity: 0.8,
                cursor: 'move',
                tolerance: 'pointer',
                stop: function(event, ui) {
                    reindexGrades();
                    updateGradeNumbers();
                }
            });
        }
    }
    
    /**
     * Initialize sortable for all pack sizes containers
     */
    function initAllPackSizesSortable() {
        $('.azytus-pack-sizes-container').each(function() {
            initPackSizesSortable($(this));
        });
    }
    
    /**
     * Initialize sortable for a specific pack sizes container
     */
    function initPackSizesSortable(container) {
        if ($.fn.sortable && container.length) {
            container.sortable({
                handle: '.drag-handle',
                placeholder: 'ui-sortable-placeholder',
                helper: 'clone',
                opacity: 0.8,
                cursor: 'move',
                tolerance: 'pointer',
                items: '.azytus-pack-size-row',
                cancel: '.azytus-add-pack-button',
                stop: function(event, ui) {
                    reindexPackSizes(container);
                }
            });
        }
    }
    
    /**
     * Initialize sortable for batches
     */
    function initBatchesSortable() {
        if ($.fn.sortable) {
            $('#azytus-batches-container').sortable({
                handle: '.azytus-batch-drag-handle',
                placeholder: 'ui-sortable-placeholder',
                helper: 'clone',
                opacity: 0.8,
                cursor: 'move',
                tolerance: 'pointer',
                stop: function(event, ui) {
                    reindexBatches();
                    updateBatchNumbers();
                }
            });
        }
    }
    
    // Initialize batches sortable on page load
    $(document).ready(function() {
        initBatchesSortable();
    });
    
})(jQuery);
