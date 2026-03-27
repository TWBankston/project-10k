# WordPress Free Plugin Stack

> **Philosophy:** If it costs money, we build it ourselves. This stack uses only free plugins, with custom code solutions for features that typically require paid alternatives.

---

## Essential Plugins

### 1. SEO — RankMath Free
**Why RankMath over Yoast Free:**
- More features in free tier (multiple focus keywords, advanced schema markup)
- Better UI/UX, cleaner interface
- Built-in 404 monitor, redirections, local SEO
- Google Search Console integration included free

**Setup:**
1. Install RankMath from WordPress repo
2. Run setup wizard (import from Yoast if migrating)
3. Connect Google Search Console
4. Enable modules: SEO Analysis, Sitemap, Schema (Rich Snippets), Redirections, 404 Monitor

**Key Free Features:**
- Unlimited focus keywords per post
- Advanced schema markup (Article, LocalBusiness, Product, FAQ, HowTo)
- XML sitemap with image sitemap
- Breadcrumbs
- SEO analysis with actionable suggestions
- Link suggestions

---

### 2. Caching/Performance — LiteSpeed Cache
**Why LiteSpeed Cache:**
- Works on ANY hosting (not just LiteSpeed servers)
- Image optimization built-in (QUIC.cloud free tier: 10k images/month)
- CSS/JS minification and combination
- Database optimization
- CDN support (Cloudflare, QUIC.cloud)
- Lazy loading for images/iframes

**If not on LiteSpeed hosting, use:** WP Super Cache (simpler) or W3 Total Cache (more control)

**LiteSpeed Cache Setup:**
1. Install from WordPress repo
2. General → Request QUIC.cloud Domain Key (free)
3. Cache tab: Enable all caching options
4. Page Optimization: Enable CSS/JS minify, combine
5. Image Optimization: Enable WebP conversion, lazy load
6. Database: Schedule weekly cleanup

**Alternative Stack (non-LiteSpeed hosting):**
- **WP Super Cache** for page caching
- **Autoptimize** (free) for CSS/JS optimization
- **ShortPixel** (free tier: 100 images/month) for image optimization

---

### 3. Security — Wordfence Free
**Why Wordfence:**
- Real-time firewall (free tier has 30-day delayed rules, still effective)
- Malware scanner
- Login security (2FA, rate limiting, reCAPTCHA)
- Live traffic monitoring
- Country blocking (limited in free)

**Setup:**
1. Install Wordfence
2. Run initial scan
3. Firewall → Optimize Firewall → Follow instructions to enable extended protection
4. Login Security: Enable 2FA for all admin accounts
5. Scan Settings: Schedule weekly scans

**Hardening Checklist:**
- [ ] Change default admin username
- [ ] Enable brute force protection
- [ ] Set failed login lockout (5 attempts, 20 min lockout)
- [ ] Enable reCAPTCHA on login/register
- [ ] Hide WordPress version

---

### 4. Backup — UpdraftPlus Free
**Why UpdraftPlus:**
- Schedule automatic backups
- Remote storage (Google Drive, Dropbox, email — all free)
- One-click restore
- Incremental backups (reduces server load)

**Setup:**
1. Install UpdraftPlus
2. Settings → Connect Google Drive (or Dropbox)
3. Schedule: Files weekly, Database daily
4. Retain: 4 file backups, 14 database backups
5. Test restore on staging site

**Backup Strategy:**
- **Daily:** Database only (small, fast)
- **Weekly:** Full backup (files + database)
- **Before updates:** Manual full backup
- **Store copies:** At least 2 locations (Google Drive + local download monthly)

---

### 5. Forms — Forminator (Free)
**Why Forminator over Contact Form 7:**
- Drag-and-drop builder (CF7 is code-based)
- Built-in styling options
- Conditional logic in free tier
- Quiz and poll functionality
- Submissions stored in database (not just email)
- Export submissions to CSV

**Why Forminator over WPForms Lite:**
- No field limits in free tier
- Conditional logic included free
- More styling options
- File uploads in free tier

**Setup:**
1. Install Forminator
2. Create contact form with: Name, Email, Phone, Message
3. Settings: Set notification email, confirmation message
4. Enable Google reCAPTCHA (Forms → Settings → Privacy)
5. Add to Contact page with shortcode or block

---

### 6. Analytics — Site Kit by Google
**Why Site Kit:**
- Official Google plugin
- Connects: GA4, Search Console, PageSpeed Insights, AdSense, Tag Manager
- Dashboard in WordPress admin
- No manual code insertion needed

**Setup:**
1. Install Site Kit
2. Authenticate with Google account
3. Connect services: Search Console → Analytics (GA4) → PageSpeed Insights
4. Optional: Connect Tag Manager if using advanced tracking

**What You Get:**
- Traffic overview in WP dashboard
- Search performance data
- Page speed metrics
- Easy property setup

---

## Page Building

### Elementor Free — What's Included

**Free Features:**
- Drag-and-drop editor
- 40+ basic widgets (heading, image, text, button, icon, divider, spacer, Google Maps, icon box, image box, star rating, testimonial, tabs, accordion, toggle, social icons, progress bar, counter, alert, HTML, shortcode, sidebar, anchor, video, sound cloud)
- Mobile responsive editing
- Template library (limited free templates)
- Theme builder for single pages/posts only
- Revision history

**What Requires Pro (and workarounds):**

| Pro Feature | Free Workaround |
|-------------|-----------------|
| Theme Builder (header/footer) | Use theme's customizer, or custom PHP templates |
| WooCommerce Builder | Use WooCommerce default templates + CSS |
| Popup Builder | Use free plugin: Popup Maker |
| Forms | Use Forminator + shortcode |
| Motion Effects | CSS animations via Custom CSS class |
| Dynamic Content | ACF + custom shortcodes |
| Global Widgets | Create template, copy/paste, or use PHP includes |
| Custom Fonts | Upload via theme or plugin (Custom Fonts free plugin) |
| Role Manager | Custom PHP solution (see custom-code.md) |

**Elementor Free Workflow:**
1. Use Hello Elementor or Astra theme (minimal, fast)
2. Build pages with free widgets
3. For forms: Add Forminator shortcode inside Elementor text widget or HTML widget
4. For popups: Use Popup Maker plugin, trigger with Elementor button (add popup class)
5. For header/footer: Use theme customizer or custom child theme templates

### Alternative: Gutenberg + Block Plugins

**If avoiding Elementor entirely:**

**Core Block Enhancements (Free):**
- **Spectra** (formerly UAG) — 30+ blocks, starter templates, popup builder
- **Stackable** — Advanced blocks, global colors/typography
- **GenerateBlocks** — Lightweight, developer-friendly

**Recommended Gutenberg Stack:**
1. **Spectra** — Most Elementor-like experience
2. Use block patterns for reusable sections
3. Full Site Editing (FSE) with compatible theme (Spectra One, Starter Templates)

**When to Use Gutenberg vs Elementor:**
- **Gutenberg:** Faster, less bloat, better for simple sites, blogs, content-heavy sites
- **Elementor Free:** More visual design control, better for marketing pages, landing pages

---

## Client Portal — Custom Build

> Since good client portal plugins (SuiteDash, Client Portal for WordPress) are paid, we build our own.

### Architecture Overview

```
Client Portal Structure:
├── Custom Post Type: "projects"
├── ACF Fields: Status, files, notes, client assignment
├── Custom Page Template: dashboard.php
├── Password Protection: Per-project or per-page
└── Simple UI: View status, download files, leave comments
```

### Implementation

See `custom-code.md` for complete code snippets:
1. Register "Projects" CPT
2. Add ACF field groups for project data
3. Create dashboard page template
4. Restrict access by user/password
5. Simple file management with ACF repeater

### Features We Can Build:

- ✅ Project overview dashboard
- ✅ Status tracking (Not Started, In Progress, Review, Complete)
- ✅ File attachments (deliverables, assets)
- ✅ Project notes/updates
- ✅ Client-specific access (password or user login)
- ✅ Email notifications on status change

### Features We Skip (too complex):

- ❌ Full messaging system (use email)
- ❌ Invoicing integration (use separate tool like Wave, Stripe)
- ❌ Time tracking (use Toggl, Clockify)
- ❌ Client task assignment (use Notion, Basecamp)

---

## Full Plugin List Summary

| Category | Plugin | Source |
|----------|--------|--------|
| SEO | RankMath Free | WordPress.org |
| Caching | LiteSpeed Cache | WordPress.org |
| Security | Wordfence Free | WordPress.org |
| Backup | UpdraftPlus Free | WordPress.org |
| Forms | Forminator | WordPress.org |
| Analytics | Site Kit by Google | WordPress.org |
| Page Builder | Elementor Free | WordPress.org |
| Popups | Popup Maker | WordPress.org |
| Custom Fields | ACF (Free) | WordPress.org |
| Custom Fonts | Custom Fonts | WordPress.org |

**Total cost: $0**

---

## Plugin Maintenance

**Weekly:**
- Check for plugin updates
- Review Wordfence scan results
- Check backup status

**Monthly:**
- Test backup restore
- Review analytics
- Check for new free alternatives to any pain points

**Before Any Update:**
- Full backup via UpdraftPlus
- Test on staging if possible
- Document what was updated

---

## What We DON'T Need Plugins For

These are better handled with code (see `custom-code.md`):
- **Schema markup** — RankMath handles most, custom code for edge cases
- **GA4/GTM injection** — Site Kit or 5 lines of code
- **Custom post types** — Code is cleaner than CPT UI plugin
- **Simple redirects** — RankMath includes this
- **Coming soon page** — Single page template
- **Social sharing** — HTML/CSS buttons, no tracking bloat
