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
    });
    
})(jQuery);
