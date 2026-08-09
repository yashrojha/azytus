/**
 * Azytus Toolkit - Frontend Scripts
 */

(function($) {
    'use strict';

    /**
     * True when a cell value is present (not empty / N/A placeholder).
     */
    function azytusHasColumnValue(value) {
        if (value === true) {
            return true;
        }
        if (value === false || value == null) {
            return false;
        }
        return String(value).trim() !== '';
    }

    /**
     * Build a results table, omitting columns with no values in the current result set.
     *
     * @param {Array} items
     * @param {Array<{label:string, hasValue:Function, cell:Function}>} columns
     * @param {string} tableClass
     * @returns {string}
     */
    function azytusBuildResultsTable(items, columns, tableClass) {
        var visible = columns.filter(function(column) {
            return items.some(function(item) {
                return azytusHasColumnValue(column.hasValue(item));
            });
        });

        if (!visible.length) {
            return '<div class="azytus-no-results">No data to display.</div>';
        }

        var html = '<div class="azytus-table-wrapper"><table class="' + tableClass + '">';
        html += '<thead><tr>';
        visible.forEach(function(column) {
            html += '<th>' + column.label + '</th>';
        });
        html += '</tr></thead><tbody>';

        items.forEach(function(item) {
            html += '<tr>';
            visible.forEach(function(column) {
                html += '<td>' + column.cell(item) + '</td>';
            });
            html += '</tr>';
        });

        html += '</tbody></table></div>';
        return html;
    }
    
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

        // Product page: grade tabs under Available Grades & Pack Sizes
        $('[data-azytus-grade-tabs]').each(function() {
            var $root = $(this);
            var $tabs = $root.find('[data-azytus-grade-tab]');
            var $panels = $root.find('[data-azytus-grade-panel]');

            function activateTab($tab) {
                var panelId = $tab.attr('aria-controls');

                $tabs.removeClass('is-active').attr({
                    'aria-selected': 'false',
                    tabindex: '-1'
                });
                $tab.addClass('is-active').attr({
                    'aria-selected': 'true',
                    tabindex: '0'
                });

                $panels.removeClass('is-active').attr('hidden', true);
                $root.find('#' + panelId).addClass('is-active').removeAttr('hidden');
            }

            function normalizeGradeKey(value) {
                return String(value || '')
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }

            function findTabForGrade(rawGrade) {
                if (!rawGrade) {
                    return $();
                }

                var needle = normalizeGradeKey(rawGrade);
                var $match = $();

                $tabs.each(function() {
                    var $tab = $(this);
                    var candidates = [
                        $tab.data('grade-slug'),
                        $tab.data('grade-code'),
                        $tab.data('grade-name'),
                        $tab.text()
                    ];

                    for (var i = 0; i < candidates.length; i++) {
                        if (normalizeGradeKey(candidates[i]) === needle) {
                            $match = $tab;
                            return false;
                        }
                    }
                });

                return $match;
            }

            function getRequestedGrade() {
                var params = new URLSearchParams(window.location.search);
                var fromQuery = params.get('grade');
                if (fromQuery) {
                    return fromQuery;
                }

                var hash = window.location.hash || '';
                var hashMatch = hash.match(/^#grade[=-](.+)$/i);
                if (hashMatch && hashMatch[1]) {
                    return decodeURIComponent(hashMatch[1]);
                }

                return '';
            }

            $tabs.on('click', function(e) {
                e.preventDefault();
                var $tab = $(this);
                activateTab($tab);

                var slug = $tab.data('grade-slug');
                if (slug && window.history && window.history.replaceState) {
                    var url = new URL(window.location.href);
                    url.searchParams.set('grade', slug);
                    window.history.replaceState({}, '', url.toString());
                }
            });

            $tabs.on('keydown', function(e) {
                var keys = ['ArrowLeft', 'ArrowRight', 'Home', 'End'];
                if (keys.indexOf(e.key) === -1) {
                    return;
                }

                e.preventDefault();
                var index = $tabs.index(this);
                var next = index;

                if (e.key === 'ArrowRight') {
                    next = (index + 1) % $tabs.length;
                } else if (e.key === 'ArrowLeft') {
                    next = (index - 1 + $tabs.length) % $tabs.length;
                } else if (e.key === 'Home') {
                    next = 0;
                } else if (e.key === 'End') {
                    next = $tabs.length - 1;
                }

                var $next = $tabs.eq(next);
                activateTab($next);
                $next.trigger('focus');
            });

            var requestedGrade = getRequestedGrade();
            if (requestedGrade) {
                var $requestedTab = findTabForGrade(requestedGrade);
                if ($requestedTab.length) {
                    activateTab($requestedTab);
                }
            }
        });
        
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
            var html = azytusBuildResultsTable(results, [
                {
                    label: 'Product Name',
                    hasValue: function(item) { return item.product_name; },
                    cell: function(item) { return '<strong>' + (item.product_name || '') + '</strong>'; }
                },
                {
                    label: 'CAS Number',
                    hasValue: function(item) { return item.cas; },
                    cell: function(item) { return item.cas || ''; }
                },
                {
                    label: 'HSN Code',
                    hasValue: function(item) { return item.hsn; },
                    cell: function(item) { return item.hsn || ''; }
                },
                {
                    label: 'Molecular Formula',
                    hasValue: function(item) { return item.molecular_formula; },
                    cell: function(item) { return item.molecular_formula || ''; }
                },
                {
                    label: 'Molecular Weight',
                    hasValue: function(item) { return item.molecular_weight; },
                    cell: function(item) {
                        return item.molecular_weight ? (item.molecular_weight + ' g/mol') : '';
                    }
                },
                {
                    label: 'Product Code',
                    hasValue: function(item) { return item.product_code; },
                    cell: function(item) { return item.product_code || ''; }
                },
                {
                    label: 'Pack Size(s)',
                    hasValue: function(item) { return item.pack_sizes; },
                    cell: function(item) { return item.pack_sizes || ''; }
                },
                {
                    label: 'MSDS',
                    hasValue: function(item) { return !!item.has_msds; },
                    cell: function(item) {
                        if (item.has_msds) {
                            return '<a href="' + item.msds_url + '" target="_blank" class="button button-small">View</a>';
                        }
                        return '<span style="color: #999;">N/A</span>';
                    }
                }
            ], 'azytus-product-table');

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
                alert('Please enter a batch number');
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
            var html = azytusBuildResultsTable(results, [
                {
                    label: 'Batch No.',
                    hasValue: function(item) { return item.batch_no; },
                    cell: function(item) { return '<strong>' + (item.batch_no || '') + '</strong>'; }
                },
                {
                    label: 'Code',
                    hasValue: function(item) { return item.code; },
                    cell: function(item) { return item.code || ''; }
                },
                {
                    label: 'Pack Size',
                    hasValue: function(item) { return item.pack_size; },
                    cell: function(item) { return item.pack_size || ''; }
                },
                {
                    label: 'Product Name with Grade',
                    hasValue: function(item) { return item.product_name_with_grade; },
                    cell: function(item) { return item.product_name_with_grade || ''; }
                },
                {
                    label: 'COA',
                    hasValue: function(item) { return !!item.has_coa; },
                    cell: function(item) {
                        if (item.has_coa) {
                            return '<a href="' + item.coa_url + '" target="_blank" class="button button-primary button-small">Download</a>';
                        }
                        return '<span style="color: #999;">Not available</span>';
                    }
                },
                {
                    label: 'MSDS',
                    hasValue: function(item) { return !!item.has_msds; },
                    cell: function(item) {
                        if (item.has_msds) {
                            return '<a href="' + item.msds_url + '" target="_blank" class="button button-small">View</a>';
                        }
                        return '<span style="color: #999;">N/A</span>';
                    }
                }
            ], 'azytus-coa-table');

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

            var $productInput = $('#azytus-header-product-input');
            var $clearBtn = $('#azytus-header-search-clear');
            var $productBtn = $('#azytus-header-product-btn');
            var $coaBtn = $('#azytus-header-coa-btn');
            var $actionBtns = $productBtn.add($coaBtn);
            var $status = $('#azytus-header-search-status');
            var $results = $('#azytus-header-search-results');

            function syncClearButton() {
                if (getSearchTerm()) {
                    $clearBtn.removeAttr('hidden');
                } else {
                    $clearBtn.attr('hidden', true);
                }
            }

            function resetForm() {
                $productInput.val('');
                clearResults();
                syncClearButton();
            }

            function openPopup() {
                $popup.removeAttr('hidden').attr('aria-hidden', 'false').addClass('is-open');
                $('body').addClass('azytus-search-open');
                setTimeout(function() {
                    $productInput.trigger('focus');
                }, 50);
            }

            function closePopup() {
                resetForm();
                $popup.attr('hidden', true).attr('aria-hidden', 'true').removeClass('is-open');
                $('body').removeClass('azytus-search-open');
            }

            function getSearchTerm() {
                return ($productInput.val() || '').toString().trim();
            }

            function requireSearchTerm(message) {
                var term = getSearchTerm();
                if (!term) {
                    showStatus(message || 'Please enter a search term.', 'error');
                    $productInput.trigger('focus');
                    return null;
                }
                return term;
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

            function setSearching(isSearching) {
                $actionBtns.prop('disabled', isSearching);
                $productInput.prop('disabled', isSearching);
                $clearBtn.prop('disabled', isSearching);
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
                var html = azytusBuildResultsTable(items, [
                    {
                        label: 'Product Name',
                        hasValue: function(item) { return item.product_name; },
                        cell: function(item) {
                            var name = escapeHtml(item.product_name);
                            if (item.product_url) {
                                name = '<a href="' + escapeHtml(item.product_url) + '">' + name + '</a>';
                            }
                            return '<strong>' + name + '</strong>';
                        }
                    },
                    {
                        label: 'Code',
                        hasValue: function(item) { return item.product_code; },
                        cell: function(item) { return escapeHtml(item.product_code || ''); }
                    },
                    {
                        label: 'Pack Size(s)',
                        hasValue: function(item) { return item.pack_sizes; },
                        cell: function(item) { return escapeHtml(item.pack_sizes || ''); }
                    },
                    {
                        label: 'CAS',
                        hasValue: function(item) { return item.cas; },
                        cell: function(item) { return escapeHtml(item.cas || ''); }
                    },
                    {
                        label: 'HSN',
                        hasValue: function(item) { return item.hsn; },
                        cell: function(item) { return escapeHtml(item.hsn || ''); }
                    },
                    {
                        label: 'Molecular Formula',
                        hasValue: function(item) { return item.molecular_formula; },
                        cell: function(item) { return escapeHtml(item.molecular_formula || ''); }
                    },
                    {
                        label: 'Molecular Weight',
                        hasValue: function(item) { return item.molecular_weight; },
                        cell: function(item) {
                            return item.molecular_weight ? (escapeHtml(item.molecular_weight) + ' g/mol') : '';
                        }
                    },
                    {
                        label: 'MSDS',
                        hasValue: function(item) { return !!item.has_msds; },
                        cell: function(item) {
                            if (item.has_msds) {
                                return '<a href="' + escapeHtml(item.msds_url) + '" target="_blank" rel="noopener" class="button button-small">View</a>';
                            }
                            return '<span class="azytus-na">N/A</span>';
                        }
                    }
                ], 'azytus-product-table azytus-header-results-table');

                $results.html(html);
            }

            function renderCOATable(items) {
                var html = azytusBuildResultsTable(items, [
                    {
                        label: 'Batch No.',
                        hasValue: function(item) { return item.batch_no; },
                        cell: function(item) { return '<strong>' + escapeHtml(item.batch_no) + '</strong>'; }
                    },
                    {
                        label: 'Code',
                        hasValue: function(item) { return item.code; },
                        cell: function(item) { return escapeHtml(item.code); }
                    },
                    {
                        label: 'Pack Size',
                        hasValue: function(item) { return item.pack_size; },
                        cell: function(item) { return escapeHtml(item.pack_size); }
                    },
                    {
                        label: 'Product',
                        hasValue: function(item) { return item.product_name_with_grade; },
                        cell: function(item) {
                            var product = escapeHtml(item.product_name_with_grade);
                            if (item.product_url) {
                                product = '<a href="' + escapeHtml(item.product_url) + '">' + product + '</a>';
                            }
                            return product;
                        }
                    },
                    {
                        label: 'COA',
                        hasValue: function(item) { return !!item.has_coa; },
                        cell: function(item) {
                            if (item.has_coa) {
                                return '<a href="' + escapeHtml(item.coa_url) + '" target="_blank" rel="noopener" class="button button-primary button-small">Download</a>';
                            }
                            return '<span class="azytus-na">N/A</span>';
                        }
                    },
                    {
                        label: 'MSDS',
                        hasValue: function(item) { return !!item.has_msds; },
                        cell: function(item) {
                            if (item.has_msds) {
                                return '<a href="' + escapeHtml(item.msds_url) + '" target="_blank" rel="noopener" class="button button-small">View</a>';
                            }
                            return '<span class="azytus-na">N/A</span>';
                        }
                    }
                ], 'azytus-coa-table azytus-header-results-table');

                $results.html(html);
            }

            function searchProducts() {
                var searchTerm = requireSearchTerm('Please enter a keyword to search products.');
                if (!searchTerm) {
                    return;
                }

                clearResults();
                showStatus('Searching products…', 'loading');
                setSearching(true);

                $.ajax({
                    url: azytusFrontend.ajax_url,
                    type: 'POST',
                    data: {
                        action: 'azytus_search_products',
                        search_term: searchTerm,
                        nonce: azytusFrontend.nonce
                    },
                    success: function(response) {
                        setSearching(false);
                        if (response.success && response.data && response.data.length) {
                            showStatus(response.data.length + ' product' + (response.data.length === 1 ? '' : 's') + ' found', 'success');
                            renderProductTable(response.data);
                        } else {
                            showStatus('No products found for this search.', 'error');
                            $results.empty();
                        }
                    },
                    error: function() {
                        setSearching(false);
                        showStatus('An error occurred. Please try again.', 'error');
                    }
                });
            }

            function searchCOA() {
                var searchTerm = requireSearchTerm('Please enter a batch number.');
                if (!searchTerm) {
                    return;
                }

                clearResults();
                showStatus('Searching COA / batches…', 'loading');
                setSearching(true);

                $.ajax({
                    url: azytusFrontend.ajax_url,
                    type: 'POST',
                    data: {
                        action: 'azytus_search_coa',
                        search_term: searchTerm,
                        nonce: azytusFrontend.nonce
                    },
                    success: function(response) {
                        setSearching(false);
                        if (response.success && response.data && response.data.length) {
                            showStatus(response.data.length + ' batch' + (response.data.length === 1 ? '' : 'es') + ' found', 'success');
                            renderCOATable(response.data);
                        } else {
                            var msg = (response.data && response.data.message)
                                ? response.data.message
                                : 'No COA / batch records found for this search.';
                            showStatus(msg, 'error');
                            $results.empty();
                        }
                    },
                    error: function() {
                        setSearching(false);
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

            $productBtn.on('click', function(e) {
                e.preventDefault();
                searchProducts();
            });

            $coaBtn.on('click', function(e) {
                e.preventDefault();
                searchCOA();
            });

            $clearBtn.on('click', function(e) {
                e.preventDefault();
                resetForm();
                $productInput.trigger('focus');
            });

            $productInput.on('input', syncClearButton);

            $('#azytus-header-search-form').on('submit', function(e) {
                e.preventDefault();
            });

            $productInput.on('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                }
            });

            syncClearButton();
        }
    });
    
})(jQuery);
