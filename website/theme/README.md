# TBDesigned WordPress Theme

**Version:** 1.0.0  
**Author:** Tyler Bankston  
**License:** GPL v2 or later

A fast, custom WordPress theme for TBDesigned.io — built without page builders, pure PHP/CSS/JS.

## Features

✅ **No Page Builders** — Pure custom templates, no bloat  
✅ **Fast Performance** — Target <2s load time, mobile-first  
✅ **SEO Optimized** — Structured data, semantic HTML, meta control  
✅ **Accessible** — WCAG AA compliant, keyboard navigation, ARIA labels  
✅ **Custom Post Types** — Projects, Testimonials, Client Projects  
✅ **Client Portal** — Built-in dashboard for client project management  
✅ **ACF Integration** — Optional Advanced Custom Fields support  
✅ **Responsive** — Mobile-first design, works on all devices  
✅ **Modern CSS** — CSS custom properties, grid, flexbox  
✅ **Clean Code** — Well-documented, easy to maintain

## Installation

### Requirements
- WordPress 6.0 or higher
- PHP 8.0 or higher
- MySQL 5.7 or higher

### Steps

1. **Upload theme:**
   ```bash
   # Upload to wp-content/themes/tbdesigned-theme/
   # Or ZIP and upload via WordPress admin
   ```

2. **Activate:**
   - Go to Appearance > Themes
   - Activate "TBDesigned"

3. **Initial Setup:**
   - Go to Appearance > Customize
   - Upload logo
   - Set contact information
   - Configure social links
   - Set colors (if needed)

4. **Create Menus:**
   - Go to Appearance > Menus
   - Create "Primary Menu" and "Footer Menu"
   - Assign to locations

5. **Create Pages:**
   - Homepage (set as static front page)
   - Services
   - Portfolio
   - About
   - Contact
   - Client Portal (for logged-in clients)

6. **Install Recommended Plugins:**
   - See `/website/wordpress/free-plugin-stack.md`
   - Minimum: RankMath, LiteSpeed Cache, Wordfence, UpdraftPlus

## Theme Structure

```
tbdesigned-theme/
├── style.css                     # Theme header + base styles
├── functions.php                 # Main theme setup
├── header.php                    # Site header
├── footer.php                    # Site footer
├── index.php                     # Blog archive
├── front-page.php                # Homepage template
├── single.php                    # Single post
├── 404.php                       # Error page
├── page-contact.php              # Contact page template
├── page-services.php             # Services page template
├── page-portfolio.php            # Portfolio page template
├── page-client-portal.php        # Client dashboard template
│
├── /inc/
│   ├── theme-setup.php           # Theme configuration
│   ├── enqueue.php               # Scripts & styles
│   ├── custom-post-types.php    # CPTs & taxonomies
│   ├── client-portal.php         # Client portal functionality
│   ├── ajax-handlers.php         # AJAX form handlers
│   ├── schema-markup.php         # Structured data
│   └── acf-fields.php            # ACF field definitions
│
├── /template-parts/
│   ├── content.php               # Post card
│   ├── content-none.php          # No results
│   ├── project-card.php          # Portfolio project card
│   └── testimonial.php           # Testimonial block
│
├── /assets/
│   ├── /css/
│   │   ├── main.css              # Primary stylesheet
│   │   ├── variables.css         # CSS custom properties
│   │   └── utilities.css         # Utility classes
│   ├── /js/
│   │   ├── main.js               # Core JavaScript
│   │   ├── navigation.js         # Mobile menu
│   │   ├── forms.js              # Form handling & AJAX
│   │   └── portal.js             # Client portal interactions
│   └── /images/
│       └── logo.svg              # Site logo placeholder
│
└── /acf-json/                    # ACF field group exports
```

## Custom Post Types

### Projects (`tbdesigned_project`)
Portfolio/showcase projects with:
- Featured image
- Client name, URL, completion date
- Services provided
- Technologies used
- Project gallery
- Categories & tags

### Testimonials (`tbdesigned_testimonial`)
Client testimonials with:
- Author name, role, company
- Star rating
- Avatar image
- Related project link

### Client Projects (`tbdesigned_client_project`)
For client portal:
- Assigned to specific client user
- Status tracking (pending/in-progress/review/completed)
- File uploads & downloads
- Activity log
- Milestones & deliverables

## Client Portal

### Setup

1. **Create a client:**
   ```php
   // Programmatically
   $client_id = tbdesigned_create_client(
       'client@example.com',
       'John',
       'Doe',
       'Company Name'
   );
   ```

2. **Create a page:**
   - Create new page titled "Client Portal"
   - Set slug to `client-portal`
   - Assign template: Client Portal

3. **Create project:**
   - Go to Client Projects > Add New
   - Fill in project details
   - Assign to client user
   - Set status

4. **Client login:**
   - Clients log in at `/wp-login.php`
   - Redirected to `/client-portal/`
   - Can view projects, download files, track status

### Client Portal Features

- Project overview dashboard
- File downloads
- Project status tracking
- Activity timeline
- Milestone progress
- Deliverable checklist

## Page Templates

### Homepage (`front-page.php`)
- Hero section with CTA
- Services preview
- Featured projects grid
- Testimonials
- Call-to-action section

### Contact (`page-contact.php`)
- AJAX contact form
- Contact information
- Social links
- Form validation & spam protection

### Services (`page-services.php`)
- Service cards with pricing
- Features list
- CTA buttons
- Customizable via ACF fields

### Portfolio (`page-portfolio.php`)
- Project grid with filtering
- Category navigation
- Featured projects
- Lightbox support

## Customization

### CSS Variables

Edit `/assets/css/variables.css`:

```css
:root {
    --color-primary: #2563eb;      /* Brand color */
    --color-secondary: #7c3aed;    /* Accent color */
    --font-body: system-ui;        /* Body font */
    /* ... */
}
```

### Adding Custom Fields

1. Install ACF Free
2. Edit `/inc/acf-fields.php`
3. Add field groups programmatically
4. Or use ACF UI and sync to `/acf-json/`

### Hooks & Filters

Theme includes standard WordPress hooks:

```php
// Modify excerpt length
add_filter('excerpt_length', function() {
    return 30;
});

// Add custom body class
add_filter('body_class', function($classes) {
    $classes[] = 'my-custom-class';
    return $classes;
});
```

## Performance

### Optimization Checklist

- [x] Minimal dependencies (no jQuery by default)
- [x] Inline critical CSS
- [x] Deferred JavaScript
- [x] Lazy loading images
- [x] Minified assets
- [x] No external fonts (system font stack)
- [x] Efficient database queries
- [x] Browser caching headers

### Testing

```bash
# PageSpeed Insights
https://pagespeed.web.dev/

# GTmetrix
https://gtmetrix.com/

# Target metrics:
- Load time: <2s
- First Contentful Paint: <1.5s
- Largest Contentful Paint: <2.5s
- Time to Interactive: <3.5s
```

## Security

### Built-in Protection

- ✅ Nonce verification on forms
- ✅ Input sanitization
- ✅ Output escaping
- ✅ Rate limiting on contact forms
- ✅ Honeypot spam protection
- ✅ Client role access control
- ✅ File upload restrictions

### Recommended Practices

1. Keep WordPress core updated
2. Install Wordfence or similar security plugin
3. Use strong passwords
4. Enable 2FA for admin users
5. Regular backups via UpdraftPlus
6. HTTPS/SSL certificate required

## Troubleshooting

### Contact form not sending
1. Test with WP Mail SMTP plugin
2. Check spam folder
3. Verify `wp_mail()` works on server
4. Check error logs

### Client portal blank
1. Ensure user has `tbdesigned_client` role
2. Check permalink settings (flush rewrite rules)
3. Verify page slug is `client-portal`

### CSS not loading
1. Hard refresh browser (Ctrl+Shift+R)
2. Clear cache plugin
3. Check file permissions
4. Verify wp_head() in header.php

### 404 on custom post types
1. Go to Settings > Permalinks
2. Click "Save Changes" (flushes rewrite rules)
3. No changes needed, just save

## Development

### Local Setup

```bash
# Clone/download theme
cd wp-content/themes/
git clone <repo> tbdesigned-theme

# Or download ZIP
unzip tbdesigned-theme.zip
```

### File Watching (Optional)

If adding build process:

```bash
npm install
npm run watch   # For development
npm run build   # For production
```

### Coding Standards

- Follow WordPress Coding Standards
- Use proper escaping: `esc_html()`, `esc_url()`, `esc_attr()`
- Sanitize inputs: `sanitize_text_field()`, `sanitize_email()`
- Prefix functions: `tbdesigned_`
- Comment complex logic
- Keep functions under 50 lines when possible

## Support

- **Documentation:** This README
- **Plugin Guide:** `/website/wordpress/free-plugin-stack.md`
- **Issues:** Report via GitHub or email
- **Contact:** hello@tbdesigned.io

## Changelog

### 1.0.0 (2026-03-27)
- Initial release
- Core theme structure
- Custom post types
- Client portal
- ACF integration
- AJAX forms
- Responsive design
- SEO optimization
- Schema markup

## Credits

- **Theme Author:** Tyler Bankston
- **Icons:** Lucide (inline SVG)
- **Typography:** System font stack
- **Inspiration:** Modern web standards, performance-first design

## License

This theme is licensed under the GPL v2 or later.

```
Copyright 2026 Tyler Bankston

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
```

---

**Built with ❤️ in Asheville, NC**
