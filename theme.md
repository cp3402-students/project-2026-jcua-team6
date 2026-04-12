# KcTennisBlastTeam6 Theme – Developer Handover Guide

## Theme Overview

This theme is a custom WordPress theme built on Underscores (_s). It follows the standard WordPress template hierarchy while introducing a modern design system using CSS variables, reusable components, and simplified layouts.

The overall goal is to provide a clean, consistent, and easily maintainable design.


## Theme Features

### 1. Global Design System (CSS Variables)

All key design values are defined in `:root`, including:

- Colours:
  - `--primary-color`
  - `--secondary-color`
  - `--button-color`
  - `--button-hover-color`
  - `--link-color`
  - `--link-hover-color`

- Typography:
  - `--font-body`
  - `--font-heading`
  - `--font-button`

- Font sizes:
  - `--p-font-size`
  - `--h2-font-size`

This allows consistent styling and quick global updates.

---

### 2. Typography System

- Headings use the heading font (Abel)
- Body text uses Barlow
- Buttons use Poppins

Font sizes scale using variables and media queries.

---

### 3. Navigation System

- Uses `wp_nav_menu()` with `theme_location: menu-1`
- Mobile menu toggle supported via `.menu-toggle`
- Desktop layout uses Flexbox

Features:
- Menu links use `--link-color`
- Hover state uses `--link-hover-color`
- Supports dropdown menus (basic hover implementation)

---

### 4. Button System

All buttons share consistent styling:

- Background: `--button-color`
- Hover:
  - Changes to `--button-hover-color`
  - Text colour switches
  - Slight lift (`translateY`)
  - Shadow effect

Applies to:
- `<button>`
- Form inputs
- Gutenberg buttons (`.wp-block-button__link`)

---

### 5. Post Card Component

Custom reusable layout for posts:

Classes:
- `.post-card`
- `.post-card-media`
- `.post-card-body`

Features:
- Responsive image with `object-fit: cover`
- Hover animation
- Styled metadata and categories
- Modern card-based layout

---

### 6. Footer Component

Custom-built footer.

Sections:
- Contact
- Hours
- Social links
- Tagline

Uses CSS Grid for layout:
- Responsive columns
- Centered content

Secitions are editable via: `<div class="footer-section footer-contact">` inside `functions.php`. The widgets themselves can be edited on Wordpress via its inbuitl editor in `Appearance -> Widgets`


## Key Files and Structure

### Core Templates

- `header.php`  
  Contains site header, logo, and navigation menu.

- `footer.php`  
  Contains custom footer layout and content.

- `single.php`  
  Handles single post display using the WordPress loop.

- `functions.php` 
  Handles Widget area and 

- `style.css`  
  Main stylesheet and theme definition.

---

### Header (`header.php`)

- Displays custom logo
- Outputs navigation menu
- Includes mobile menu toggle
- Contains a hardcoded logo inside navigation

---

### Footer (`footer.php`)

- Static content (not dynamic widgets)
- Uses translation functions (`esc_html_e`)
- Contact information is hardcoded

---

### Single Post (`single.php`)

- Uses WordPress loop
- Loads content via:
  `get_template_part('template-parts/content', get_post_type());`

---

### Styles (`style.css`)

Organised into:
- Normalize
- Base styles
- Components
- Utilities
- Footer

---

## Conventions Used

### 1. CSS Naming

Component-based naming:
- `.post-card-*`
- `.footer-*`
- `.main-navigation`

---

### 2. CSS Variables

- All colours and fonts use variables
- Enables easy theme-wide updates

---

### 3. Mobile-First Design

- Base styles for mobile
- Media queries enhance for larger screens

---

### 4. WordPress Standards

- Uses core functions:
  - `wp_head()`
  - `wp_footer()`
  - `esc_html_e()`
- Follows Underscores structure

---

## Important Design Decisions

### 1. Centralised Styling

All design values are stored in `:root`, allowing quick updates and consistency.

---

### 2. Custom Footer

Footer is hardcoded instead of using widgets.

Pros:
- Full design control

Cons:
- Not editable via WordPress admin

---

### 3. Post Card Layout

Uses modern card-based design instead of default WordPress post layout.

---

### 4. Minimal JavaScript

Most interactions (hover effects, animations) are handled with CSS.

---

## Non-Obvious Details

### 1. Duplicate Logo

Two logos are present:
- `the_custom_logo()`
- Hardcoded `<img>` inside navigation

This may cause duplication issues.

---

### 2. Footer Uses `have_posts()`

Footer contains a conditional check for posts, which is unnecessary and misleading.

---

### 3. Entry Titles Hidden

`.entry-title { display: none; }`

This hides titles globally and may affect SEO and accessibility.

---

### 4. Hardcoded Contact Information

Footer contact details are static and not editable through WordPress.

---

## Recommendations for Improvement

- Convert footer to widget areas or Customizer settings
- Remove duplicate logo in header
- Make contact info dynamic (Customizer or ACF)
- Re-enable entry titles where appropriate

---

## Summary

This theme is:

- Built on Underscores (_s)
- Structured and modular
- Styled using a global design system
- Focused on consistency and modern UI

Strengths:
- Easy to maintain and restyle
- Clear structure
- Reusable components

Limitations:
- Hardcoded content in footer
- Minor structural quirks
- Some non-standard implementation choices
