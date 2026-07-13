/**
 * Azytus Toolkit - Frontend Scripts
 */

(function($) {
    'use strict';
    
    $(document).ready(function() {
        
        // Initialize Select2 on frontend if available
        if ($.fn.select2) {
            $('.azytus-select2-frontend').select2({
                placeholder: function() {
                    return $(this).find('option:first').text();
                },
                allowClear: true,
                width: '100%'
            });
        }
        
        // Product Search
        $('#azytus-search-btn').on('click', function() {
            performProductSearch();
        });
        
        // Search on Enter key
        $('#azytus-search-term').on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                performProductSearch();
            }
        });
        
        // Load grades when category changes
        $('#azytus-filter-category').on('change', function() {
            var categoryId = $(this).val();
            var gradeSelect = $('#azytus-filter-grade');
            var packSelect = $('#azytus-filter-pack-size');
            
            if (!categoryId) {
                gradeSelect.html('<option value="">All Grades</option>').trigger('change');
                packSelect.html('<option value="">All Pack Sizes</option>').trigger('change');
                return;
            }
            
            // Load grades via AJAX
            $.ajax({
                url: azytusFrontend.ajax_url,
                type: 'POST',
                data: {
                    action: 'azytus_get_subcategories',
                    category_id: categoryId,
                    nonce: azytusFrontend.nonce
                },
                success: function(response) {
                    if (response.success) {
                        var options = '<option value="">All Grades</option>';
                        $.each(response.data, function(index, item) {
                            options += '<option value="' + item.id + '">' + item.text + '</option>';
                        });
                        gradeSelect.html(options).trigger('change');
                    }
                }
            });
            
            packSelect.html('<option value="">All Pack Sizes</option>').trigger('change');
        });
        
        // Load pack sizes when grade changes
        $('#azytus-filter-grade').on('change', function() {
            var categoryId = $('#azytus-filter-category').val();
            var gradeId = $(this).val();
            var packSelect = $('#azytus-filter-pack-size');
            
            if (!categoryId || !gradeId) {
                packSelect.html('<option value="">All Pack Sizes</option>').trigger('change');
                return;
            }
            
            // Load pack sizes via AJAX
            $.ajax({
                url: azytusFrontend.ajax_url,
                type: 'POST',
                data: {
                    action: 'azytus_get_pack_sizes',
                    category_id: categoryId,
                    subcategory_id: gradeId,
                    nonce: azytusFrontend.nonce
                },
                success: function(response) {
                    if (response.success) {
                        var options = '<option value="">All Pack Sizes</option>';
                        $.each(response.data, function(index, item) {
                            options += '<option value="' + item.id + '">' + item.text + '</option>';
                        });
                        packSelect.html(options).trigger('change');
                    }
                }
            });
        });
        
        function performProductSearch() {
            var searchTerm = $('#azytus-search-term').val();
            var categoryId = $('#azytus-filter-category').val();
            var gradeId = $('#azytus-filter-grade').val();
            var packSizeId = $('#azytus-filter-pack-size').val();
            
            $.ajax({
                url: azytusFrontend.ajax_url,
                type: 'POST',
                data: {
                    action: 'azytus_search_products',
                    search_term: searchTerm,
                    category_id: categoryId,
                    grade_id: gradeId,
                    pack_size_id: packSizeId,
                    nonce: azytusFrontend.nonce
                },
                beforeSend: function() {
                    $('.azytus-loader').show();
                    $('.azytus-results-table').html('');
                },
                success: function(response) {
                    $('.azytus-loader').hide();
                    
                    if (response.success && response.data.length > 0) {
                        displayProductResults(response.data);
                    } else {
                        $('.azytus-results-table').html('<div class="azytus-no-results">No products found.</div>');
                    }
                },
                error: function() {
                    $('.azytus-loader').hide();
                    $('.azytus-results-table').html('<div class="azytus-no-results">An error occurred. Please try again.</div>');
                }
            });
        }
        
        function displayProductResults(results) {
            var html = '<div class="azytus-table-wrapper"><table class="azytus-product-table">';
            html += '<thead><tr>';
            html += '<th>Product Name</th>';
            html += '<th>CAS Number</th>';
            html += '<th>HSN Code</th>';
            html += '<th>Molecular Formula</th>';
            html += '<th>Molecular Weight</th>';
            html += '<th>Product Code</th>';
            html += '<th>Grade</th>';
            html += '<th>Pack Size(s)</th>';
            html += '<th>MSDS</th>';
            html += '</tr></thead>';
            html += '<tbody>';
            
            $.each(results, function(index, item) {
                html += '<tr>';
                html += '<td><strong>' + item.product_name + '</strong></td>';
                html += '<td>' + item.cas + '</td>';
                html += '<td>' + item.hsn + '</td>';
                html += '<td>' + item.molecular_formula + '</td>';
                html += '<td>' + item.molecular_weight + ' g/mol</td>';
                html += '<td>' + item.product_code + '</td>';
                html += '<td>' + item.grade + '</td>';
                html += '<td>' + item.pack_sizes + '</td>';
                html += '<td>';
                if (item.has_msds) {
                    html += '<a href="' + item.msds_url + '" target="_blank" class="button button-small">View</a>';
                } else {
                    html += '<span style="color: #999;">N/A</span>';
                }
                html += '</td>';
                html += '</tr>';
            });
            
            html += '</tbody></table></div>';
            
            $('.azytus-results-table').html(html);
        }
        
        // COA Lookup
        $('#azytus-coa-lookup-btn').on('click', function() {
            lookupCOA();
        });
        
        // COA lookup on Enter key
        $('#azytus-batch-lookup').on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                lookupCOA();
            }
        });
        
        function lookupCOA() {
            var searchTerm = $('#azytus-batch-lookup').val().trim();
            
            if (!searchTerm) {
                alert('Please enter a batch number or product code');
                return;
            }
            
            // Hide previous results
            $('.azytus-coa-results').hide();
            $('.azytus-coa-error').hide();
            
            // Search for COA
            $.ajax({
                url: azytusFrontend.ajax_url,
                type: 'POST',
                data: {
                    action: 'azytus_search_coa',
                    search_term: searchTerm,
                    nonce: azytusFrontend.nonce
                },
                beforeSend: function() {
                    $('.azytus-coa-loader').show();
                    $('#azytus-coa-lookup-btn').prop('disabled', true).text('Searching...');
                },
                success: function(response) {
                    $('.azytus-coa-loader').hide();
                    $('#azytus-coa-lookup-btn').prop('disabled', false).text('Search');
                    
                    if (response.success && response.data.length > 0) {
                        displayCOAResults(response.data);
                        $('.azytus-coa-results').show();
                    } else {
                        $('.azytus-coa-error').show();
                    }
                },
                error: function(xhr) {
                    $('.azytus-coa-loader').hide();
                    $('#azytus-coa-lookup-btn').prop('disabled', false).text('Search');
                    $('.azytus-coa-error').show();
                }
            });
        }
        
        function displayCOAResults(results) {
            var html = '<div class="azytus-table-wrapper"><table class="azytus-coa-table">';
            html += '<thead><tr>';
            html += '<th>Batch No.</th>';
            html += '<th>Code</th>';
            html += '<th>Pack Size</th>';
            html += '<th>Product Name with Grade</th>';
            html += '<th>COA</th>';
            html += '<th>MSDS</th>';
            html += '</tr></thead>';
            html += '<tbody>';
            
            $.each(results, function(index, item) {
                html += '<tr>';
                html += '<td><strong>' + item.batch_no + '</strong></td>';
                html += '<td>' + item.code + '</td>';
                html += '<td>' + item.pack_size + '</td>';
                html += '<td>' + item.product_name_with_grade + '</td>';
                html += '<td>';
                if (item.has_coa) {
                    html += '<a href="' + item.coa_url + '" target="_blank" class="button button-primary button-small">Download</a>';
                } else {
                    html += '<span style="color: #999;">Not available</span>';
                }
                html += '</td>';
                html += '<td>';
                if (item.has_msds) {
                    html += '<a href="' + item.msds_url + '" target="_blank" class="button button-small">View</a>';
                } else {
                    html += '<span style="color: #999;">N/A</span>';
                }
                html += '</td>';
                html += '</tr>';
            });
            
            html += '</tbody></table></div>';
            
            $('.azytus-coa-results-table').html(html);
        }

        /* ---------------------------------------------
         * Header grade search popup
         * --------------------------------------------- */
        initHeaderSearch();

        function initHeaderSearch() {
            var $popup = $('#azytus-header-search-popup');
            var $template = $('#azytus-header-search-btn-template');
            if (!$popup.length || !$template.length) {
                return;
            }

            // Inject search button as first element in every .nav-right
            var btnHtml = $template.html();
            $('.nav-right').each(function() {
                var $nav = $(this);
                if (!$nav.find('.azytus-header-search-btn').length) {
                    $nav.prepend(btnHtml);
                }
            });

            var $gradeSelect = $('#azytus-header-grade-select');
            var $status = $('#azytus-header-search-status');
            var $results = $('#azytus-header-search-results');

            function openPopup() {
                $popup.removeAttr('hidden').attr('aria-hidden', 'false').addClass('is-open');
                $('body').addClass('azytus-search-open');
                setTimeout(function() {
                    $gradeSelect.trigger('focus');
                }, 50);
            }

            function closePopup() {
                $popup.attr('hidden', true).attr('aria-hidden', 'true').removeClass('is-open');
                $('body').removeClass('azytus-search-open');
            }

            function getSelectedGradeId() {
                return ($gradeSelect.val() || '').toString();
            }

            function requireGrade() {
                var gradeId = getSelectedGradeId();
                if (!gradeId) {
                    showStatus('Please select a grade first.', 'error');
                    return null;
                }
                return gradeId;
            }

            function showStatus(message, type) {
                $status
                    .removeAttr('hidden')
                    .removeClass('is-error is-loading is-success')
                    .addClass(type === 'error' ? 'is-error' : (type === 'loading' ? 'is-loading' : 'is-success'))
                    .text(message);
            }

            function clearResults() {
                $results.empty();
                $status.attr('hidden', true).text('');
            }

            function escapeHtml(str) {
                return String(str == null ? '' : str)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            function renderProductTable(items) {
                var html = '<div class="azytus-table-wrapper"><table class="azytus-product-table azytus-header-results-table">';
                html += '<thead><tr>';
                html += '<th>Product Name</th><th>Code</th><th>Grade</th><th>Pack Size(s)</th><th>CAS</th><th>MSDS</th>';
                html += '</tr></thead><tbody>';

                $.each(items, function(i, item) {
                    var name = escapeHtml(item.product_name);
                    if (item.product_url) {
                        name = '<a href="' + escapeHtml(item.product_url) + '">' + name + '</a>';
                    }
                    html += '<tr>';
                    html += '<td><strong>' + name + '</strong></td>';
                    html += '<td>' + escapeHtml(item.product_code) + '</td>';
                    html += '<td>' + escapeHtml(item.grade) + '</td>';
                    html += '<td>' + escapeHtml(item.pack_sizes) + '</td>';
                    html += '<td>' + escapeHtml(item.cas) + '</td>';
                    html += '<td>';
                    if (item.has_msds) {
                        html += '<a href="' + escapeHtml(item.msds_url) + '" target="_blank" rel="noopener" class="button button-small">View</a>';
                    } else {
                        html += '<span class="azytus-na">N/A</span>';
                    }
                    html += '</td></tr>';
                });

                html += '</tbody></table></div>';
                $results.html(html);
            }

            function renderCOATable(items) {
                var html = '<div class="azytus-table-wrapper"><table class="azytus-coa-table azytus-header-results-table">';
                html += '<thead><tr>';
                html += '<th>Batch No.</th><th>Code</th><th>Pack Size</th><th>Product</th><th>COA</th><th>MSDS</th>';
                html += '</tr></thead><tbody>';

                $.each(items, function(i, item) {
                    var product = escapeHtml(item.product_name_with_grade);
                    if (item.product_url) {
                        product = '<a href="' + escapeHtml(item.product_url) + '">' + product + '</a>';
                    }
                    html += '<tr>';
                    html += '<td><strong>' + escapeHtml(item.batch_no) + '</strong></td>';
                    html += '<td>' + escapeHtml(item.code) + '</td>';
                    html += '<td>' + escapeHtml(item.pack_size) + '</td>';
                    html += '<td>' + product + '</td>';
                    html += '<td>';
                    if (item.has_coa) {
                        html += '<a href="' + escapeHtml(item.coa_url) + '" target="_blank" rel="noopener" class="button button-primary button-small">Download</a>';
                    } else {
                        html += '<span class="azytus-na">N/A</span>';
                    }
                    html += '</td><td>';
                    if (item.has_msds) {
                        html += '<a href="' + escapeHtml(item.msds_url) + '" target="_blank" rel="noopener" class="button button-small">View</a>';
                    } else {
                        html += '<span class="azytus-na">N/A</span>';
                    }
                    html += '</td></tr>';
                });

                html += '</tbody></table></div>';
                $results.html(html);
            }

            function searchProductsByGrade() {
                var gradeId = requireGrade();
                if (!gradeId) {
                    return;
                }

                $.ajax({
                    url: azytusFrontend.ajax_url,
                    type: 'POST',
                    data: {
                        action: 'azytus_search_products',
                        grade_id: gradeId,
                        nonce: azytusFrontend.nonce
                    },
                    beforeSend: function() {
                        clearResults();
                        showStatus('Searching products…', 'loading');
                        $('#azytus-header-product-btn, #azytus-header-coa-btn').prop('disabled', true);
                    },
                    success: function(response) {
                        $('#azytus-header-product-btn, #azytus-header-coa-btn').prop('disabled', false);
                        if (response.success && response.data && response.data.length) {
                            showStatus(response.data.length + ' product' + (response.data.length === 1 ? '' : 's') + ' found', 'success');
                            renderProductTable(response.data);
                        } else {
                            showStatus('No products found for this grade.', 'error');
                            $results.empty();
                        }
                    },
                    error: function() {
                        $('#azytus-header-product-btn, #azytus-header-coa-btn').prop('disabled', false);
                        showStatus('An error occurred. Please try again.', 'error');
                    }
                });
            }

            function searchCOAByGrade() {
                var gradeId = requireGrade();
                if (!gradeId) {
                    return;
                }

                $.ajax({
                    url: azytusFrontend.ajax_url,
                    type: 'POST',
                    data: {
                        action: 'azytus_search_coa',
                        grade_id: gradeId,
                        nonce: azytusFrontend.nonce
                    },
                    beforeSend: function() {
                        clearResults();
                        showStatus('Searching COA / batches…', 'loading');
                        $('#azytus-header-product-btn, #azytus-header-coa-btn').prop('disabled', true);
                    },
                    success: function(response) {
                        $('#azytus-header-product-btn, #azytus-header-coa-btn').prop('disabled', false);
                        if (response.success && response.data && response.data.length) {
                            showStatus(response.data.length + ' batch' + (response.data.length === 1 ? '' : 'es') + ' found', 'success');
                            renderCOATable(response.data);
                        } else {
                            var msg = (response.data && response.data.message) ? response.data.message : 'No COA / batch records found for this grade.';
                            showStatus(msg, 'error');
                            $results.empty();
                        }
                    },
                    error: function() {
                        $('#azytus-header-product-btn, #azytus-header-coa-btn').prop('disabled', false);
                        showStatus('An error occurred. Please try again.', 'error');
                    }
                });
            }

            $(document).on('click', '.azytus-header-search-btn', function(e) {
                e.preventDefault();
                openPopup();
            });

            $(document).on('click', '[data-azytus-search-close]', function(e) {
                e.preventDefault();
                closePopup();
            });

            $(document).on('keydown', function(e) {
                if (e.key === 'Escape' && $popup.hasClass('is-open')) {
                    closePopup();
                }
            });

            $('#azytus-header-coa-btn').on('click', function(e) {
                e.preventDefault();
                searchCOAByGrade();
            });

            $('#azytus-header-product-btn').on('click', function(e) {
                e.preventDefault();
                searchProductsByGrade();
            });
        }
    });
    
})(jQuery);
