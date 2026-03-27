# TBDesigned Theme Structure

Custom WordPress theme for TBDesigned.io — no page builders, pure PHP/CSS/JS.

```
tbdesigned-theme/
├── style.css                    # Theme header + base styles
├── functions.php                # Theme setup, enqueues, CPTs, menus
├── index.php                    # Fallback template
├── header.php                   # Site header with navigation
├── footer.php                   # Footer with CTA, links, schema
├── front-page.php               # Homepage template
├── page-services.php            # Services page with pricing cards
├── page-about.php               # About page template
├── page-contact.php             # Contact page with form
├── page-portfolio.php           # Portfolio/work showcase
├── page-client-portal.php       # Client dashboard (logged-in users)
├── single.php                   # Single blog post
├── single-tbdesigned_project.php # Single project view
├── archive.php                  # Blog archive/listing
├── archive-tbdesigned_project.php # Projects archive
├── 404.php                      # Error page
├── searchform.php               # Search form template
├── search.php                   # Search results
│
├── /template-parts/
│   ├── content.php              # Standard post content
│   ├── content-none.php         # No results found
│   ├── hero.php                 # Hero section component
│   ├── service-card.php         # Individual service card
│   ├── project-card.php         # Portfolio project card
│   ├── testimonial.php          # Testimonial block
│   └── cta-section.php          # Call-to-action section
│
├── /assets/
│   ├── /css/
│   │   ├── main.css             # Primary stylesheet (mobile-first)
│   │   ├── variables.css        # CSS custom properties
│   │   └── utilities.css        # Utility classes
│   ├── /js/
│   │   ├── main.js              # Primary JavaScript
│   │   ├── navigation.js        # Mobile nav functionality
│   │   └── forms.js             # Form validation & AJAX
│   └── /images/
│       ├── logo.svg             # Site logo
│       └── placeholder.svg      # Placeholder image
│
└── /inc/
    ├── custom-post-types.php    # Projects CPT, Testimonials CPT
    ├── acf-fields.php           # ACF field configurations
    ├── client-portal.php        # Client dashboard functionality
    ├── ajax-handlers.php        # Form handling, file uploads
    ├── schema-markup.php        # Structured data injection
    ├── theme-setup.php          # Theme supports, menus, widgets
    └── enqueue.php              # Script/style enqueueing
```

## Template Hierarchy Notes

- `front-page.php` — Static homepage (set in Settings > Reading)
- `page-{slug}.php` — Custom page templates (services, about, contact, portfolio)
- `single-{post_type}.php` — Custom post type single views
- `archive-{post_type}.php` — Custom post type archives

## Performance Targets

- **Load time:** <2s on 3G
- **Total CSS:** <50KB
- **Total JS:** <30KB
- **No external fonts by default** (system font stack)
- **Lazy loading** on all images
- **Critical CSS** inlined in header

## Accessibility

- Semantic HTML5
- ARIA labels where needed
- Skip links
- Keyboard navigation
- Color contrast AA compliant
