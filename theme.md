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

Navigation uses WordPress’s menu system:
```css
wp_nav_menu(array(
  'theme_location' => 'menu-1'
));
```

Features:

- Mobile-first design
- Toggle menu (.menu-toggle) on small screens
- Flexbox layout on desktop
- Dropdown support via hover
```css
.main-navigation.toggled ul {
display: block;
}
```

---

### 4. Button System

All buttons share consistent styling:

- Background: `--button-color`
- Hover:
  - Changes to `--button-hover-color`
  - Text colour switches
  - Slight lift (`translateY`)
  - Shadow effect

```css 
button,
.wp-block-button__link {
  background-color: var(--button-color);
  transition: all 0.3s ease;
}

button:hover {
  transform: translateY(-2px);
}
```
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
- Card-based layout

---

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

---

### Footer (`footer.php`)
Sections:
- Contact
- Hours
- Social links
- Tagline

Uses CSS Grid for layout:
- Responsive columns
- Centered content

Secitions are editable via: `<div class="footer-section footer-contact">` inside `functions.php`. The widgets themselves can be edited on Wordpress via its inbuilt editor in `Appearance -> Widgets`

Theming and Styling is controlled by `styles.css` and is in the `.footer-widget` tag.


---

### Single Post (`single.php`)

- Uses WordPress loop
- Loads content via:
  `get_template_part('template-parts/content', get_post_type());`
- Contains Post content and structure

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
- `.menu-button` -> Specifically for the Alternate colours on CTA button (`BOOK CLASSES NOW`)



---

### 2. CSS Variables

- All colours and fonts use variables
- Enables easy theme-wide updates

---

### 3. WordPress Standards

- Uses core functions:
  - `wp_head()`
  - `wp_footer()`
  - `esc_html_e()`

---




