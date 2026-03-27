# Free WordPress Plugin Stack
## TBDesigned Theme - Essential Plugins Only

This theme is designed to work with minimal plugins. Only install what you actually need.

## Core Plugins (Recommended)

### SEO
**RankMath Free** (`seo-by-rank-math`)
- SEO optimization and structured data
- No paid version needed for basics
- Integrates with Google Search Console
- Alternative: Yoast SEO Free

### Performance & Caching
**LiteSpeed Cache** (`litespeed-cache`)
- Best if using LiteSpeed server
- Free caching, image optimization, CDN
- Alternative: **WP Super Cache** or **W3 Total Cache**

### Security
**Wordfence Free** (`wordfence`)
- Firewall and malware scanner
- Login security
- Alternative: **Solid Security** (formerly iThemes Security)

### Backups
**UpdraftPlus Free** (`updraftplus`)
- Scheduled backups to cloud storage
- Easy restore
- Alternative: **BackWPup Free**

### Forms
**Contact Form 7** (`contact-form-7`)
- Simple, reliable contact forms
- Spam protection with reCAPTCHA or Akismet
- Alternative: **WPForms Lite**

### Analytics
**Site Kit by Google** (`google-site-kit`)
- Official Google plugin
- Integrates Search Console, Analytics, PageSpeed
- No configuration headache

### Custom Fields (Optional)
**Advanced Custom Fields (ACF) Free** (`advanced-custom-fields`)
- Already integrated in theme
- Use for client portal custom fields
- Only needed if using client portal features

## Optional Plugins (As Needed)

### If Using E-Commerce
**WooCommerce** (`woocommerce`)
- Only if selling products
- Theme is compatible but not required

### If Managing Clients
**User Role Editor** (`user-role-editor`)
- Manage custom client role permissions
- Free version is sufficient

### If Email Issues
**WP Mail SMTP** (`wp-mail-smtp`)
- Fix WordPress email delivery
- Use with SendGrid/Mailgun free tiers

### If Heavy Media
**Smush** (`wp-smushit`)
- Image compression and optimization
- Free tier handles most needs

### If Using Page Builder (NOT RECOMMENDED)
- This theme is designed WITHOUT page builders
- Adds unnecessary bloat and complexity
- Use theme templates instead

## What NOT to Install

❌ **Elementor / Divi / Beaver Builder** - Theme has custom templates  
❌ **Jetpack** - Bloated, most features unnecessary  
❌ **All-in-One SEO** - Conflicts with RankMath  
❌ **Multiple caching plugins** - Use ONE only  
❌ **Multiple security plugins** - Conflicts guaranteed  
❌ **Page speed testers** - Use external tools instead  
❌ **Broken link checkers** - Resource intensive  

## Post-Install Configuration

### 1. RankMath Setup
```
1. Install & activate
2. Run setup wizard
3. Connect to Google Search Console
4. Enable schema for Organization, LocalBusiness
5. Set focus keyword for key pages
```

### 2. LiteSpeed Cache Setup
```
1. Install & activate
2. Go to LiteSpeed Cache > General Settings
3. Enable "Cache" and "Object Cache"
4. Go to Image Optimization > WebP
5. Enable lazy load
```

### 3. Wordfence Setup
```
1. Install & activate
2. Get free license key from wordfence.com
3. Enable login page firewall
4. Set 2FA for admin users
```

### 4. UpdraftPlus Setup
```
1. Install & activate
2. Go to Settings > UpdraftPlus Backups
3. Set schedule (daily for DB, weekly for files)
4. Choose storage (Dropbox, Google Drive, etc.)
5. Run first backup manually
```

### 5. Contact Form 7 Setup
```
1. Install & activate
2. Go to Contact > Contact Forms
3. Edit default form or create new
4. Add form fields matching page-contact.php
5. Add shortcode to contact page
6. Enable reCAPTCHA in settings
```

### 6. Site Kit Setup
```
1. Install & activate
2. Connect Google account
3. Authorize Search Console & Analytics
4. Dashboard widgets auto-populate
```

## Performance Checklist

After plugin installation:

- [ ] Test homepage load time (target <2s)
- [ ] Check PageSpeed Insights score (target 90+)
- [ ] Verify forms work and send email
- [ ] Test backup restore process
- [ ] Check security scan results
- [ ] Verify SEO metadata on key pages
- [ ] Test mobile responsiveness
- [ ] Check broken links (manually)
- [ ] Verify all images load properly
- [ ] Test contact form spam protection

## Maintenance Schedule

**Daily (Automated)**
- Database backup via UpdraftPlus
- Security scan via Wordfence

**Weekly**
- Review analytics in Site Kit
- Check for plugin updates
- Full site backup

**Monthly**
- Review SEO performance in RankMath
- Test form submissions
- Check security logs
- Clear cache and test performance

## Support Resources

- RankMath: https://rankmath.com/kb/
- LiteSpeed Cache: https://docs.litespeedtech.com/
- Wordfence: https://www.wordfence.com/help/
- UpdraftPlus: https://updraftplus.com/support/
- Contact Form 7: https://contactform7.com/docs/
- Site Kit: https://sitekit.withgoogle.com/documentation/

---

**Remember:** Less is more. Every plugin adds load time and potential security risks. Only install what you actually use.
