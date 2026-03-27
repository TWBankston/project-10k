# WordPress Theme Setup Guide

> Choosing and configuring a free theme optimized for speed, flexibility, and Elementor compatibility.

---

## Recommended Free Themes

### 1. **Hello Elementor** (Best for Elementor users)

**Why Hello Elementor:**
- Official Elementor theme — built specifically for page builders
- Minimal styling (blank canvas)
- Extremely lightweight (~20KB total)
- No bloat, no default styles to override
- Best performance of any Elementor-compatible theme

**When to use:**
- Building primarily with Elementor
- Want total design control
- Need fastest possible loading times
- Don't need theme-level customization options

**Limitations:**
- Requires Elementor for header/footer (or custom PHP templates)
- No built-in theme customizer options
- Very minimal without page builder

**Download:** WordPress.org → Search "Hello Elementor"

---

### 2. **Astra Free** (Most versatile)

**Why Astra:**
- 50+ starter templates (free)
- Works great with Elementor, Gutenberg, or any builder
- Extensive customization in theme customizer
- Fast and lightweight when configured properly
- Header/footer builder built-in (free tier)
- WooCommerce optimized

**When to use:**
- Want built-in header/footer customization
- Need flexibility between page builders
- Want starter templates to speed up design
- Building e-commerce sites

**Free Features:**
- Unlimited header/footer layouts
- Typography controls
- Color controls
- Blog layouts
- Sidebar options
- Mobile responsive controls

**Pro Features (NOT needed):**
- Advanced header builder
- Custom layouts
- White label
- Mega menu
- Portfolio module

**Download:** WordPress.org → Search "Astra"

---

### 3. **Kadence Free** (Best Gutenberg experience)

**Why Kadence:**
- Excellent Gutenberg integration
- Built-in header/footer builder (free)
- Advanced typography and color controls
- Starter templates with Kadence Blocks
- Fast and lightweight
- Great for accessibility (WCAG compliant)

**When to use:**
- Prefer Gutenberg over Elementor
- Need accessible design
- Want robust free theme without page builder dependency
- Building content-heavy sites (blogs, portfolios)

**Free Features:**
- Visual header builder
- Custom fonts (Google, Adobe, local)
- Advanced color palette
- Responsive design controls
- Performance optimizations

**Download:** WordPress.org → Search "Kadence"

---

### 4. **GeneratePress Free** (Developer-friendly)

**Why GeneratePress:**
- Clean semantic HTML
- Best performance metrics
- Modular architecture (disable what you don't need)
- Works with any page builder
- Strong developer community
- Most customizable CSS/PHP of free themes

**When to use:**
- Developer-led projects
- Custom-coded sites with minimal page builder use
- Maximum performance is priority
- Need clean codebase to extend

**Free Limitations:**
- Header/footer customization limited without Premium
- Fewer pre-built templates

**Download:** WordPress.org → Search "GeneratePress"

---

## Recommended Setup: Hello Elementor + Astra

**Why this combo?**

Use **Astra** for:
- Main site setup (header, footer, blog, archive pages)
- Global styling (colors, fonts)
- Sites where you're mixing Elementor pages with standard WordPress pages

Use **Hello Elementor** for:
- Pure Elementor builds (landing pages, sales funnels)
- Maximum performance on Elementor-only sites
- When you'll build header/footer in Elementor Pro alternative (Sticky Header Effects plugin or custom PHP)

---

## Theme Configuration Checklist

### After Installing Theme:

#### 1. **Import Starter Template** (if using Astra/Kadence)
- Astra: Appearance → Starter Templates → Choose free template → Import
- Kadence: Appearance → Starter Templates → Browse library → Import

#### 2. **Set Global Colors**
```
Customizer → Colors

Primary Color: Your brand color
Accent Color: CTA buttons, links
Text Color: #333333 (dark gray, better than pure black)
Background Color: #FFFFFF
```

#### 3. **Configure Typography**
```
Customizer → Typography

Body Font: System font stack (fastest) or Google Font
  - System: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif
  - Google: Inter, Open Sans, Roboto, or Poppins
  
Base Font Size: 16px (never go below this for accessibility)

Heading Font: Same as body (cleanest) or complementary
H1: 2.5rem / 40px
H2: 2rem / 32px
H3: 1.5rem / 24px
```

**Performance Tip:** Use system fonts instead of Google Fonts for fastest load times.

#### 4. **Header Configuration**
```
Customizer → Header Builder (Astra/Kadence)

Desktop Header:
├── Left: Logo
├── Center: Primary Menu
└── Right: CTA Button ("Get Started")

Mobile Header:
├── Left: Logo
├── Right: Mobile Menu Toggle

Sticky Header: Enable (keeps menu accessible)
Transparent Header: Enable for homepage only
```

#### 5. **Footer Configuration**
```
Customizer → Footer Builder

Footer Layout: 3 columns
├── Column 1: About text + logo
├── Column 2: Quick links (Home, Services, About, Contact)
└── Column 3: Contact info

Copyright Bar: "© 2026 TBDesigned LLC. All rights reserved."
```

#### 6. **Blog Layout**
```
Customizer → Blog / Archives

Layout: Grid (2-3 columns) or List
Sidebar: Right sidebar or No sidebar
Featured Image: Show
Excerpt Length: 30 words
Read More Text: "Continue Reading →"
```

#### 7. **Performance Settings**
```
Customizer → Performance (if available)

Disable:
- Emoji scripts
- jQuery Migrate
- Embeds script (unless using embeds)
- Block library CSS (if not using Gutenberg)

Enable:
- Preload fonts
- Lazy load images
```

---

## Child Theme Setup

**Why use a child theme:**
- Preserve custom code during theme updates
- Add custom templates without modifying parent theme
- Override specific theme functions safely

### Creating a Child Theme

#### Method 1: Manual Setup

1. Create folder: `/wp-content/themes/astra-child/` (or `hello-child`)

2. Create `style.css`:
```css
/*
Theme Name: Astra Child
Template: astra
Version: 1.0
*/

/* Your custom CSS here */
```

3. Create `functions.php`:
```php
<?php
/**
 * Enqueue parent theme styles
 */
function child_theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_uri(), array('parent-style'));
}
add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');
```

4. Activate child theme: Appearance → Themes → Activate

#### Method 2: Child Theme Configurator Plugin

1. Install "Child Theme Configurator" (free)
2. Tools → Child Themes → Create New Child Theme
3. Select parent theme (Astra, Hello Elementor, etc.)
4. Analyze parent theme → Create new child theme
5. Activate child theme

---

## Custom Templates in Child Theme

### Custom Page Template Example

Create `/wp-content/themes/your-child-theme/template-landing-page.php`:

```php
<?php
/**
 * Template Name: Landing Page (No Header/Footer)
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
while (have_posts()) : the_post();
    the_content();
endwhile;
?>
<?php wp_footer(); ?>
</body>
</html>
```

**Usage:** Create page → Template dropdown → Select "Landing Page"

---

## Theme Customizations via CSS

**Add to:** Customizer → Additional CSS (or child theme `style.css`)

### Common Customizations

```css
/* Improve link accessibility */
a {
    text-decoration-skip-ink: auto;
}

a:hover, a:focus {
    text-decoration: underline;
    outline: 2px solid transparent;
}

/* Better button defaults */
.button, .btn, .wp-block-button__link {
    display: inline-block;
    padding: 12px 24px;
    background: var(--primary-color, #0073aa);
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background 0.3s ease;
}

.button:hover, .btn:hover {
    background: var(--primary-color-dark, #005a87);
    color: #fff;
}

/* Improve form input styling */
input[type="text"],
input[type="email"],
input[type="tel"],
input[type="url"],
textarea,
select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px; /* Prevents iOS zoom on focus */
    transition: border-color 0.3s ease;
}

input:focus,
textarea:focus,
select:focus {
    border-color: var(--primary-color, #0073aa);
    outline: none;
    box-shadow: 0 0 0 3px rgba(0, 115, 170, 0.1);
}

/* Better mobile menu button */
.mobile-menu-toggle {
    padding: 8px;
    border: none;
    background: transparent;
    cursor: pointer;
}

/* Improve content readability */
.entry-content,
.post-content {
    line-height: 1.6;
    font-size: 18px;
}

.entry-content h2,
.post-content h2 {
    margin-top: 2em;
    margin-bottom: 0.5em;
}

/* Better spacing for sections */
section {
    padding: 60px 0;
}

@media (max-width: 768px) {
    section {
        padding: 40px 0;
    }
}

/* Container max-width for readability */
.container,
.site-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Hide empty elements */
.entry-content > *:empty {
    display: none;
}

/* Print styles */
@media print {
    header, footer, .no-print {
        display: none;
    }
}
```

---

## Must-Have Child Theme Functions

Add to `functions.php` in child theme:

```php
<?php
/**
 * Remove WordPress version from head (security)
 */
remove_action('wp_head', 'wp_generator');

/**
 * Add custom image sizes
 */
add_image_size('project-thumb', 400, 300, true);
add_image_size('hero-large', 1920, 800, true);

/**
 * Enable SVG uploads (use carefully)
 */
function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

/**
 * Add custom menu locations
 */
function register_custom_menus() {
    register_nav_menus(array(
        'footer-menu' => 'Footer Menu',
        'legal-menu' => 'Legal Menu (Privacy, Terms)'
    ));
}
add_action('init', 'register_custom_menus');

/**
 * Add custom widget areas
 */
function register_custom_sidebars() {
    register_sidebar(array(
        'name'          => 'Footer Column 1',
        'id'            => 'footer-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'register_custom_sidebars');

/**
 * Defer non-critical scripts
 */
function defer_scripts($tag, $handle, $src) {
    $defer_scripts = array('contact-form-7', 'google-analytics');
    
    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'defer_scripts', 10, 3);
```

---

## Theme Troubleshooting

### Common Issues

**1. Custom CSS not applying**
- Clear cache (browser + plugin)
- Check selector specificity
- Use `!important` as last resort (better: increase specificity)

**2. Elementor not loading**
- Check for theme conflicts: switch to Hello Elementor temporarily
- Regenerate CSS: Elementor → Tools → Regenerate CSS

**3. Slow page loads**
- Disable all plugins except Elementor, test speed
- Enable one at a time to identify culprit
- Check image sizes (should be <200KB each)

**4. Mobile menu not working**
- Check JavaScript console for errors
- Verify jQuery is loaded
- Check theme's mobile breakpoint setting

**5. Header/footer not showing**
- If using Hello Elementor: Must build header/footer with Elementor or custom templates
- Check Customizer → Header/Footer settings
- Verify templates are assigned correctly

---

## Theme Performance Benchmarks

Test with: GTmetrix, PageSpeed Insights, Pingdom

**Target Scores (before adding content):**
- PageSpeed: 90+ (mobile), 95+ (desktop)
- Load Time: <2 seconds
- Page Size: <1MB
- Requests: <50

**If scores are low:**
1. Disable unnecessary features in theme settings
2. Use system fonts instead of Google Fonts
3. Enable caching plugin (see free-plugin-stack.md)
4. Optimize images before uploading

---

## Theme Comparison Chart

| Feature | Hello Elementor | Astra Free | Kadence Free | GeneratePress Free |
|---------|----------------|------------|--------------|-------------------|
| **File Size** | ~20KB | ~50KB | ~60KB | ~30KB |
| **Header Builder** | ❌ | ✅ | ✅ | ❌ |
| **Footer Builder** | ❌ | ✅ | ✅ | ❌ |
| **Starter Templates** | ❌ | ✅ (50+) | ✅ (60+) | ❌ |
| **Customizer Options** | Minimal | Extensive | Extensive | Moderate |
| **Best For** | Elementor-only | All-around | Gutenberg | Developers |
| **WooCommerce** | Basic | Excellent | Good | Good |
| **Learning Curve** | Easy | Easy | Easy | Moderate |
| **Updates** | Frequent | Frequent | Frequent | Frequent |

---

## Final Recommendation

**For TBDesigned client sites:**

**Use Astra Free when:**
- Building full business websites
- Client needs ongoing content updates
- Using mix of Elementor + regular pages
- Want built-in header/footer customization

**Use Hello Elementor when:**
- Building pure landing pages / sales funnels
- Client has tech-savvy team managing Elementor
- Maximum speed is critical
- Building on top of custom code framework

**For most projects: Start with Astra Free.** It's the most forgiving and flexible for clients who will manage their own site.

---

## Next Steps

1. ✅ Choose theme based on project needs
2. ✅ Install and activate
3. ✅ Create child theme
4. ✅ Import starter template (optional)
5. ✅ Configure global settings (colors, fonts)
6. ✅ Build header/footer
7. ✅ Install plugins (see `free-plugin-stack.md`)
8. ✅ Add custom code (see `custom-code.md`)
9. ✅ Test on mobile + tablet
10. ✅ Run performance audit

**Theme is now ready for content!**
