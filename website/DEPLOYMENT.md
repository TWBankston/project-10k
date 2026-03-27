# TBDesigned WordPress Theme - Deployment Guide

## ✅ What Was Built

A complete, production-ready custom WordPress theme for TBDesigned.io with:

### Core Theme Files
- ✅ `style.css` — Theme header + WordPress-required styles
- ✅ `functions.php` — Theme setup, hooks, helpers
- ✅ `header.php` — Sticky header with mobile nav
- ✅ `footer.php` — Footer with widgets, social links
- ✅ `index.php` — Blog archive/fallback template
- ✅ `front-page.php` — Custom homepage
- ✅ `single.php` — Single blog post
- ✅ `404.php` — Error page
- ✅ `page-contact.php` — Contact page with AJAX form
- ✅ `page-services.php` — Services page
- ✅ `page-about.php` — About page
- ✅ `page-portfolio.php` — Portfolio/projects page

### Custom Functionality (`/inc/`)
- ✅ `theme-setup.php` — WordPress theme support
- ✅ `enqueue.php` — Asset loading (CSS/JS)
- ✅ `custom-post-types.php` — Projects, Testimonials, Client Projects CPTs
- ✅ `client-portal.php` — Full client dashboard system
- ✅ `ajax-handlers.php` — Form submissions, file uploads
- ✅ `schema-markup.php` — SEO structured data
- ✅ `acf-fields.php` — Advanced Custom Fields config

### Styling (`/assets/css/`)
- ✅ `variables.css` — CSS custom properties (colors, spacing, typography)
- ✅ `main.css` — Primary stylesheet (mobile-first, ~25KB)
- ✅ `utilities.css` — Utility classes

### JavaScript (`/assets/js/`)
- ✅ `main.js` — Core functionality (smooth scroll, lazy load, animations)
- ✅ `navigation.js` — Mobile menu with accessibility
- ✅ `forms.js` — AJAX form handling & validation
- ✅ `portal.js` — Client portal interactions

### Template Parts (`/template-parts/`)
- ✅ `content.php` — Blog post card
- ✅ `content-none.php` — No results message
- ✅ `project-card.php` — Portfolio project
- ✅ `testimonial.php` — Client testimonial
- ✅ `hero.php` — Hero section component
- ✅ `pricing-card.php` — Service pricing card

### Documentation
- ✅ `README.md` — Full theme documentation
- ✅ `theme-structure.md` — File structure reference
- ✅ `free-plugin-stack.md` — Plugin recommendations

## 🎯 Key Features

### Performance
- Target load time: <2 seconds
- Mobile-first responsive design
- Lazy loading images
- Deferred JavaScript
- Inline critical CSS
- System font stack (no external fonts)

### SEO
- Structured data (Organization, LocalBusiness, Article, Breadcrumb)
- Semantic HTML5
- Clean URLs
- Meta tag support
- RankMath integration ready

### Accessibility
- WCAG AA compliant
- Keyboard navigation
- ARIA labels
- Screen reader support
- Skip links
- Focus indicators

### Security
- Nonce verification
- Input sanitization
- Output escaping
- Rate limiting
- Honeypot spam protection
- File upload restrictions

### Client Portal
- Custom user role (`tbdesigned_client`)
- Project dashboard
- File upload/download
- Status tracking
- Activity timeline
- Email notifications
- Access control

## 📦 Deployment Steps

### 1. Prepare Files

```bash
# On local machine
cd /home/node/.openclaw/workspace/10k-project/website/theme/

# ZIP the theme
zip -r tbdesigned-theme.zip . -x "*.git*" "node_modules/*" ".DS_Store"

# Or copy entire theme folder to server
```

### 2. Upload to WordPress

**Option A: Via FTP/SFTP**
```bash
# Upload to:
/public_html/wp-content/themes/tbdesigned-theme/
```

**Option B: Via WordPress Admin**
1. Go to Appearance > Themes
2. Click "Add New"
3. Click "Upload Theme"
4. Select `tbdesigned-theme.zip`
5. Click "Install Now"

### 3. Activate Theme

1. Go to Appearance > Themes
2. Find "TBDesigned"
3. Click "Activate"

### 4. Install Recommended Plugins

**Essential (Free):**
- RankMath SEO
- LiteSpeed Cache (or WP Super Cache)
- Wordfence Security
- UpdraftPlus Backup
- Contact Form 7
- Site Kit by Google

**Optional:**
- Advanced Custom Fields (ACF) — if using client portal

See `/website/wordpress/free-plugin-stack.md` for details.

### 5. Initial Configuration

**A. Customize Theme**
1. Go to Appearance > Customize
2. Upload logo (Site Identity)
3. Set contact info:
   - Email: hello@tbdesigned.io
   - Phone: (optional)
   - Address: Asheville, NC
4. Add social links:
   - LinkedIn
   - Twitter/X
   - Instagram
5. Save changes

**B. Create Menus**
1. Go to Appearance > Menus
2. Create "Primary Menu":
   - Home
   - Services
   - Portfolio
   - About
   - Blog
   - Contact
3. Assign to "Primary Menu" location
4. Create "Footer Menu" (similar)
5. Save

**C. Create Pages**
1. Home (set as static front page)
2. Services
3. Portfolio
4. About
5. Blog (posts page)
6. Contact
7. Client Portal (for logged-in clients)

**D. Set Reading Settings**
1. Go to Settings > Reading
2. Set "A static page" for homepage
3. Choose "Home" for Homepage
4. Choose "Blog" for Posts page
5. Save

**E. Set Permalink Structure**
1. Go to Settings > Permalinks
2. Choose "Post name" (recommended)
3. Save (flushes rewrite rules)

### 6. Add Content

**Portfolio Projects:**
1. Go to Projects > Add New
2. Add title, description, featured image
3. Fill in ACF fields (client, URL, date, services)
4. Add categories/tags
5. Publish

**Testimonials:**
1. Go to Testimonials > Add New
2. Add client quote as content
3. Fill in author details (name, role, company)
4. Add avatar image
5. Publish

**Blog Posts:**
1. Go to Posts > Add New
2. Write content
3. Add featured image
4. Set categories/tags
5. Publish

### 7. Configure Plugins

**RankMath:**
1. Run setup wizard
2. Connect Google Search Console
3. Enable schema types
4. Set SEO titles/descriptions

**LiteSpeed Cache:**
1. Go to LiteSpeed Cache > Settings
2. Enable cache
3. Enable image optimization
4. Enable lazy load
5. Save

**Wordfence:**
1. Get free license key
2. Activate
3. Run security scan
4. Enable firewall

**UpdraftPlus:**
1. Go to Settings > UpdraftPlus
2. Set backup schedule
3. Connect to cloud storage (Dropbox/Drive)
4. Run first backup

**Contact Form 7:**
1. Go to Contact > Contact Forms
2. Edit or create form
3. Match fields to page-contact.php
4. Copy shortcode (if needed)
5. Enable reCAPTCHA

### 8. Client Portal Setup (Optional)

**A. Create Client User:**
```php
// Via WordPress admin
1. Go to Users > Add New
2. Role: Client
3. Fill in details
4. Send login credentials

// Or programmatically
$client_id = tbdesigned_create_client(
    'client@example.com',
    'John',
    'Doe',
    'Company Name'
);
```

**B. Create Client Project:**
1. Go to Client Projects > Add New
2. Add project title & description
3. Assign to client user
4. Set status (pending/in-progress/review/completed)
5. Add start/due dates
6. Publish

**C. Client Access:**
- Client logs in at `/wp-login.php`
- Redirected to `/client-portal/`
- Views assigned projects
- Downloads files
- Tracks progress

### 9. Test Everything

**Checklist:**
- [ ] Homepage loads correctly
- [ ] All menu links work
- [ ] Contact form sends email
- [ ] Projects display on portfolio page
- [ ] Blog posts show properly
- [ ] Mobile navigation works
- [ ] Forms validate correctly
- [ ] Client portal accessible (if using)
- [ ] Search works
- [ ] 404 page displays
- [ ] Social links correct
- [ ] SEO meta tags present
- [ ] Site loads fast (<2s)
- [ ] No JavaScript errors

**Testing Tools:**
- PageSpeed Insights: https://pagespeed.web.dev/
- GTmetrix: https://gtmetrix.com/
- Mobile test: Chrome DevTools
- Accessibility: WAVE or axe DevTools

### 10. Go Live

**Pre-Launch:**
1. Remove "Coming Soon" page (if any)
2. Update search engine visibility (Settings > Reading)
3. Submit sitemap to Google Search Console
4. Set up Google Analytics (via Site Kit)
5. Test all forms one more time
6. Check all images load
7. Verify SSL certificate active

**Launch:**
1. Announce on social media
2. Monitor analytics
3. Check for errors
4. Collect feedback

## 🔧 Maintenance

**Daily (Automated):**
- Database backup (UpdraftPlus)
- Security scan (Wordfence)

**Weekly:**
- Review analytics
- Check for plugin updates
- Full site backup
- Test contact form

**Monthly:**
- Review SEO performance
- Check broken links
- Update content
- Security audit
- Performance test

## 📞 Support

**If something breaks:**
1. Check error logs: `/wp-content/debug.log`
2. Disable plugins one by one
3. Switch to default theme temporarily
4. Check server error logs
5. Contact hosting support

**Common Issues:**
- **White screen:** PHP error, check debug.log
- **404 on CPTs:** Flush permalinks (Settings > Permalinks > Save)
- **CSS not loading:** Hard refresh (Ctrl+Shift+R)
- **Forms not sending:** Install WP Mail SMTP
- **Slow site:** Check plugin conflicts, enable caching

## 🎉 You're Done!

Theme is now live and ready to use. Monitor performance, gather feedback, and iterate as needed.

**Next Steps:**
- Add more projects to portfolio
- Collect testimonials
- Start blogging
- Build email list
- Optimize for conversions

---

**Built:** 2026-03-27  
**Version:** 1.0.0  
**Deployed to:** GitHub (TWBankston/project-10k)  
**Ready for production:** ✅
