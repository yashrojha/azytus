# Azytus Toolkit

A comprehensive WordPress plugin for managing chemical products with hierarchical structure including categories, grades, pack variations, and batch tracking.

## Features

- **Chemical Categories**: Main product management with CAS, HSN, molecular formula, weight, and MSDS
- **Product Grades**: Different grades (HPLC, AR/ACS, DRYSOLV, LR) for each chemical
- **Pack Variations**: Multiple pack sizes (1L, 2.5L, 500ML, etc.)
- **Batch Records**: Batch-specific tracking with Certificate of Analysis (COA)
- **Hierarchical Relationships**: Proper linking between all levels
- **Search & Filter**: Frontend search functionality with filters
- **COA Lookup**: Quick batch number lookup for COA downloads
- **PDF Management**: Easy MSDS and COA PDF upload and management

## Installation

1. Upload the `azytus-toolkit` folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Navigate to 'Chemical Products' in the admin menu to start adding data

## Post Types

### 1. Chemical Categories (azytus_category)

Main chemical products with the following fields:
- **Product Name** (Title)
- **CAS Number** - Chemical Abstracts Service registry number
- **HSN Code** - Harmonized System of Nomenclature
- **Molecular Formula** - e.g., CH3COOH
- **Molecular Weight** - In g/mol
- **MSDS** - Material Safety Data Sheet (PDF)

### 2. Product Grades (azytus_subcategory)

Different grades for each chemical:
- **Grade Name** (Title)
- **Chemical Category** - Linked to main category
- **Grade** - e.g., HPLC, AR/ACS, DRYSOLV, LR
- **Product Code** - Unique product code

### 3. Pack Variations (azytus_variation)

Pack size variations:
- **Variation Name** (Title)
- **Chemical Category** - Linked to category
- **Product Grade** - Linked to grade
- **Pack Size** - e.g., 1 Litre, 2.5 Litre, 500 ML

### 4. Batch Records (azytus_subvariation)

Batch-specific records:
- **Batch Name** (Title)
- **Chemical Category** - Linked to category
- **Product Grade** - Linked to grade
- **Pack Size** - Linked to variation
- **Batch Number** - Unique batch/lot number
- **COA** - Certificate of Analysis (PDF)

## Admin Features

### Enhanced Admin Columns

All post types display relevant information in list views:
- Chemical Categories: CAS, HSN, Formula, Weight, MSDS
- Product Grades: Category, Grade, Product Code
- Pack Variations: Category, Grade, Pack Size
- Batch Records: Batch Number, Full hierarchy, COA

### Search & Select Dropdowns

All relationship dropdowns use Select2 for better UX:
- Searchable dropdowns
- Clear selection
- Auto-loading based on parent selection

### PDF Management

Easy file upload with WordPress Media Library:
- Upload or select existing PDFs
- File preview with links
- Quick remove option

## Frontend Shortcodes

### Product Search

Display a complete product search interface with filters:

```php
[azytus_product_search]
```

**Displays:**
- Product Name, CAS Number, HSN Code
- Molecular Formula, Molecular Weight
- Product Code, Grade, Pack Size(s)
- MSDS (Download/View)

**Filters:**
- Text search (Product name, CAS, HSN, Formula)
- Product dropdown (searchable)
- Grade dropdown (dynamic loading)
- Pack Size dropdown (dynamic loading)

Options:
- `show_filters="yes"` - Show category and grade filters (default: yes)

### COA Lookup

Add a batch number and product code lookup form:

```php
[azytus_coa_lookup]
```

**Displays:**
- Batch Number, Product Code, Pack Size
- Product Name with Grade
- COA (Download), MSDS (View)

**Search by:**
- Batch Number (e.g., "A123")
- Product Code (e.g., "10050")

### Product Display

Display specific product information:

```php
[azytus_product_display id="123" type="category"]
```

Options:
- `id` - Post ID
- `type` - Post type: `category`, `subcategory`, `variation`, or `subvariation`

## Usage Examples

### Adding a New Chemical Product

1. Go to **Chemical Products > Add New**
2. Enter the product name (e.g., "Acetone")
3. Fill in CAS, HSN, molecular formula, and weight
4. Upload MSDS PDF
5. Publish

### Adding a Grade

1. Go to **Product Grades > Add New**
2. Enter grade name (e.g., "Acetone HPLC")
3. Select the chemical category
4. Enter grade type (e.g., "HPLC")
5. Enter product code
6. Publish

### Adding Pack Variations

1. Go to **Pack Variations > Add New**
2. Enter variation name (e.g., "Acetone HPLC 1L")
3. Select category and grade
4. Enter pack size (e.g., "1 Litre")
5. Publish

### Adding Batch Records

1. Go to **Batch Records > Add New**
2. Enter batch name
3. Select category, grade, and pack size
4. Enter batch number
5. Upload COA PDF
6. Publish

## Data Architecture

The plugin uses a hierarchical structure:

```
Chemical Category (Acetone)
├── Product Grade (Acetone HPLC)
│   ├── Pack Variation (1 Litre)
│   │   └── Batch Record (Batch A123)
│   ├── Pack Variation (2.5 Litre)
│   │   └── Batch Record (Batch A124)
│   └── Pack Variation (500 ML)
│       └── Batch Record (Batch A125)
├── Product Grade (Acetone AR/ACS)
│   └── ...
└── ...
```

## Frontend Integration

### Search Page

Create a new page and add the shortcode:

```php
[azytus_product_search show_filters="yes"]
```

### COA Lookup Page

Create a dedicated COA lookup page:

```php
[azytus_coa_lookup]
```

### Product Pages

Display specific products:

```php
[azytus_product_display id="1" type="category"]
```

## AJAX Endpoints

The plugin provides several AJAX endpoints:

- `azytus_get_subcategories` - Get grades by category
- `azytus_get_variations` - Get variations by category and grade
- `azytus_search_products` - Search products with filters
- `azytus_get_coa` - Get COA by batch ID

## Customization

### Custom Templates

You can override single post templates by copying them to your theme:

```
your-theme/
└── azytus-templates/
    ├── single-azytus_category.php
    ├── single-azytus_subcategory.php
    ├── single-azytus_variation.php
    └── single-azytus_subvariation.php
```

### Custom Styling

Override the default styles by adding to your theme's CSS:

```css
.azytus-product-search {
    /* Your custom styles */
}
```

## Requirements

- WordPress 5.0 or higher
- PHP 7.2 or higher
- jQuery (included with WordPress)

## Support

For support and customization requests, contact Azytus support.

## Version

**Version:** 1.0.0  
**Author:** Azytus  
**License:** GPL v2 or later

## Changelog

### 1.0.0
- Initial release
- Chemical categories with full specifications
- Product grades management
- Pack variations
- Batch tracking with COA
- Frontend search and COA lookup
- Admin enhancements with Select2
