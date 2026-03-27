# Technical SEO Guide for TBDesigned.io

robots.txt, sitemap, Core Web Vitals, and page speed optimization for WordPress.

---

## Part 1: robots.txt Configuration

### Optimized robots.txt for WordPress

Create/edit the file at your site root: `https://tbdesigned.io/robots.txt`

```txt
# robots.txt for tbdesigned.io
# Last updated: March 2026

# Allow all search engines
User-agent: *

# Allow crawling of important directories
Allow: /wp-content/uploads/

# Disallow WordPress admin and system files
Disallow: /wp-admin/
Disallow: /wp-includes/
Disallow: /wp-content/plugins/
Disallow: /wp-content/themes/
Disallow: /wp-json/
Disallow: /readme.html
Disallow: /license.txt
Disallow: /xmlrpc.php

# Disallow search results and queries
Disallow: /*?s=
Disallow: /*?p=
Disallow: /search/

# Disallow paginated archives beyond page 1 (optional)
# Disallow: /page/

# Disallow tag and author archives (if not wanted for SEO)
# Disallow: /tag/
# Disallow: /author/

# Disallow tracking/utm parameters
Disallow: /*?utm_*
Disallow: /*&utm_*

# Disallow common spam paths
Disallow: /cgi-bin/
Disallow: /trackback/
Disallow: /feed/

# Sitemap location
Sitemap: https://tbdesigned.io/sitemap_index.xml

# Google specific
User-agent: Googlebot
Allow: /

# Bing specific
User-agent: Bingbot
Allow: /
```

### How to Edit robots.txt in WordPress

**Option 1: Using Rank Math SEO**
1. Rank Math > General Settings > Edit robots.txt
2. Paste optimized content
3. Save

**Option 2: Using Yoast SEO**
1. Yoast SEO > Tools > File editor
2. Edit robots.txt
3. Save

**Option 3: Manual (FTP/File Manager)**
1. Connect via FTP or hosting file manager
2. Navigate to site root (where wp-config.php is)
3. Create/edit `robots.txt`
4. Upload/save

### Test robots.txt

1. Visit: `https://tbdesigned.io/robots.txt`
2. Verify content is correct
3. Use Google Search Console > Settings > robots.txt Tester (if available)
4. Or: https://technicalseo.com/tools/robots-txt/

---

## Part 2: XML Sitemap Configuration

### Sitemap Structure

Your sitemap should include:

```
sitemap_index.xml (main sitemap index)
├── post-sitemap.xml (blog posts)
├── page-sitemap.xml (static pages)
├── portfolio-sitemap.xml (portfolio items, if custom post type)
└── category-sitemap.xml (categories, if used)
```

### Using Rank Math for Sitemaps

1. **Enable Sitemap:**
   - Rank Math > Sitemap Settings
   - Enable XML Sitemap: ON

2. **Configure General Settings:**
   - Links Per Sitemap: 200 (default is fine)
   - Include Images: ON
   - Include Featured Image: ON

3. **Configure Post Types:**
   - Posts: ON (for blog)
   - Pages: ON
   - Media: OFF (not needed)
   - Portfolio: ON (if using custom post type)

4. **Configure Taxonomies:**
   - Categories: ON (if you use them)
   - Tags: OFF (usually low value for SEO)

5. **Exclude URLs (if needed):**
   - Add any thank-you pages, test pages, etc.

6. **View Sitemap:**
   - Go to: `https://tbdesigned.io/sitemap_index.xml`

### Using Yoast for Sitemaps

1. Yoast SEO > Settings > Site Features
2. XML Sitemaps: ON
3. View sitemap at `https://tbdesigned.io/sitemap_index.xml`

### Submit Sitemap to Search Engines

**Google Search Console:**
1. Go to Search Console > Sitemaps
2. Enter: `sitemap_index.xml`
3. Click Submit

**Bing Webmaster Tools:**
1. Go to Bing Webmaster > Sitemaps
2. Submit URL: `https://tbdesigned.io/sitemap_index.xml`

### Sitemap Best Practices

- ✅ Keep under 50,000 URLs per sitemap
- ✅ Keep file size under 50MB
- ✅ Include only indexable pages (200 status)
- ✅ Update automatically when content changes
- ❌ Don't include noindex pages
- ❌ Don't include redirected URLs
- ❌ Don't include paginated archives (usually)

---

## Part 3: Core Web Vitals Checklist

### What Are Core Web Vitals?

| Metric | What It Measures | Good Score |
|--------|------------------|------------|
| **LCP** (Largest Contentful Paint) | Loading performance | < 2.5 seconds |
| **FID** (First Input Delay) | Interactivity | < 100 milliseconds |
| **CLS** (Cumulative Layout Shift) | Visual stability | < 0.1 |

Note: FID is being replaced by **INP** (Interaction to Next Paint) in 2024+.

### Check Your Core Web Vitals

1. **Google PageSpeed Insights:** https://pagespeed.web.dev
   - Enter your URL
   - Check both Mobile and Desktop scores

2. **Google Search Console:**
   - Core Web Vitals report
   - Shows real user data

3. **Chrome DevTools:**
   - Open DevTools > Lighthouse
   - Run audit

### LCP Optimization (Target: < 2.5s)

**Largest Contentful Paint** - time until main content loads

**Quick Wins:**
- [ ] Optimize hero image (WebP format, compressed)
- [ ] Use a CDN for images
- [ ] Enable server-side caching
- [ ] Upgrade to faster hosting if needed

**Advanced:**
- [ ] Preload critical images: `<link rel="preload" as="image" href="hero.webp">`
- [ ] Lazy load below-fold images
- [ ] Minimize render-blocking CSS/JS
- [ ] Use responsive images (`srcset`)

### FID/INP Optimization (Target: < 100ms)

**First Input Delay** - time until page responds to first interaction

**Quick Wins:**
- [ ] Reduce JavaScript execution time
- [ ] Remove unused JavaScript
- [ ] Defer non-critical JavaScript

**Advanced:**
- [ ] Break up long JavaScript tasks
- [ ] Use web workers for heavy processing
- [ ] Minimize third-party scripts

### CLS Optimization (Target: < 0.1)

**Cumulative Layout Shift** - visual stability (no jumping content)

**Quick Wins:**
- [ ] Always include width/height on images
- [ ] Reserve space for ads/embeds
- [ ] Avoid inserting content above existing content

**Common Causes:**
- Images without dimensions
- Ads/embeds loading late
- Web fonts causing text shift
- Dynamically injected content

**Fixes:**
```html
<!-- Always specify image dimensions -->
<img src="hero.jpg" width="1200" height="630" alt="...">

<!-- Or use aspect-ratio in CSS -->
.hero-image {
    aspect-ratio: 16 / 9;
    width: 100%;
}
```

---

## Part 4: Page Speed Optimization for WordPress

### Image Optimization

**Plugins to Use (pick one):**
- **ShortPixel** (recommended) - auto-compresses on upload
- **Imagify** - good free tier
- **Smush** - popular option
- **EWWW Image Optimizer** - privacy-focused

**Settings:**
1. Compression level: Lossy (best file size) or Glossy (balanced)
2. Auto-optimize on upload: ON
3. Bulk optimize existing images: Run once
4. WebP conversion: ON
5. Lazy loading: ON (or use native browser lazy loading)

**Manual Best Practices:**
- Use WebP format (30%+ smaller than JPEG)
- Resize before upload (don't upload 4000px images)
- Compress with TinyPNG before upload
- Use responsive images in theme

### Caching

**Plugins to Use (pick one):**
- **WP Rocket** (paid, best) - $49/year
- **LiteSpeed Cache** (free, if on LiteSpeed server)
- **W3 Total Cache** (free, complex)
- **WP Super Cache** (free, simple)

**Recommended Settings (WP Rocket example):**

1. **Cache:**
   - Enable caching for mobile devices: ON
   - User cache: OFF (unless membership site)
   - Cache lifespan: 10 hours

2. **File Optimization:**
   - Minify CSS: ON
   - Combine CSS: ON (test carefully)
   - Minify JavaScript: ON
   - Combine JavaScript: OFF (often breaks things)
   - Load JavaScript deferred: ON

3. **Media:**
   - LazyLoad images: ON
   - LazyLoad iframes/videos: ON
   - Add missing image dimensions: ON

4. **Preload:**
   - Preload cache: ON
   - Preload links: ON
   - Prefetch DNS: Add Google Fonts, CDN domains

5. **Database:**
   - Clean revisions: Weekly
   - Clean transients: Weekly
   - Optimize tables: Weekly

### CDN (Content Delivery Network)

**Free Options:**
- **Cloudflare** (recommended) - free tier is excellent
- **Jetpack Site Accelerator** - free, limited

**How to Set Up Cloudflare:**

1. Sign up at cloudflare.com
2. Add your site
3. Update nameservers at your registrar
4. Wait for propagation (up to 24 hours)
5. Enable these settings:
   - Auto Minify: HTML, CSS, JS
   - Brotli compression: ON
   - Always Use HTTPS: ON
   - Browser Cache TTL: 4 hours
   - Rocket Loader: OFF (often breaks things)

### Database Optimization

**Plugins:**
- **WP-Optimize** (recommended)
- **Advanced Database Cleaner**

**Monthly Cleanup:**
- [ ] Delete post revisions (keep last 3)
- [ ] Delete auto-drafts
- [ ] Delete trashed posts/comments
- [ ] Delete transient options
- [ ] Optimize database tables

**Limit Revisions (add to wp-config.php):**
```php
// Limit post revisions to 5
define('WP_POST_REVISIONS', 5);

// Increase autosave interval (seconds)
define('AUTOSAVE_INTERVAL', 120);
```

### Remove Unused Plugins/Themes

- [ ] Delete inactive plugins (not just deactivate)
- [ ] Delete unused themes (keep one default as backup)
- [ ] Remove demo content
- [ ] Clean up unused media files

### Minimize HTTP Requests

- [ ] Combine CSS files where possible
- [ ] Combine JS files where possible
- [ ] Use icon fonts or SVG instead of image icons
- [ ] Remove unnecessary widgets/embeds
- [ ] Disable emoji script if not needed:

```php
// Add to functions.php
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
```

---

## Part 5: WordPress Speed Checklist

### Hosting Requirements

For good performance, hosting should have:
- [ ] PHP 8.0+ (8.1 or 8.2 recommended)
- [ ] MySQL 8.0+ or MariaDB 10.4+
- [ ] LiteSpeed or Nginx server (faster than Apache)
- [ ] SSD storage
- [ ] Server-side caching available
- [ ] CDN integration

**Recommended Hosts:**
- Cloudways (managed VPS, $14+/mo)
- SiteGround (shared, $15+/mo)
- Kinsta (managed WordPress, $35+/mo)
- WP Engine (managed WordPress, $25+/mo)

### Quick Speed Wins

| Action | Potential Improvement |
|--------|----------------------|
| Enable caching plugin | 50-70% faster |
| Compress images | 30-50% smaller pages |
| Use CDN | 20-40% faster (varies by location) |
| Minify CSS/JS | 10-20% smaller files |
| Lazy load images | Faster initial load |
| Upgrade PHP | 10-30% faster |
| Clean database | 5-10% faster |

### Page Speed Targets

| Metric | Mobile Target | Desktop Target |
|--------|--------------|----------------|
| PageSpeed Score | 70+ | 90+ |
| LCP | < 2.5s | < 2.0s |
| FID/INP | < 100ms | < 100ms |
| CLS | < 0.1 | < 0.1 |
| Time to First Byte | < 600ms | < 400ms |
| Total Page Size | < 2MB | < 3MB |
| HTTP Requests | < 50 | < 70 |

---

## Part 6: Additional Technical SEO

### HTTPS/SSL

- [ ] SSL certificate installed
- [ ] All pages load via HTTPS
- [ ] HTTP redirects to HTTPS
- [ ] Mixed content warnings fixed
- [ ] HSTS enabled (optional, advanced)

**Check in WordPress:**
- Settings > General > WordPress Address: `https://...`
- Settings > General > Site Address: `https://...`

### Canonical Tags

- [ ] Every page has a canonical tag
- [ ] Canonical points to the correct URL
- [ ] No duplicate content issues

**Rank Math auto-handles canonicals, but verify:**
- Homepage canonical: `https://tbdesigned.io/`
- Page canonical: `https://tbdesigned.io/about/`

### Hreflang (If Multilingual)

If you later add other languages:
```html
<link rel="alternate" hreflang="en" href="https://tbdesigned.io/" />
<link rel="alternate" hreflang="es" href="https://tbdesigned.io/es/" />
<link rel="alternate" hreflang="x-default" href="https://tbdesigned.io/" />
```

### 404 Error Handling

- [ ] Custom 404 page designed
- [ ] 404 page includes navigation
- [ ] 404 page has search box
- [ ] Monitor 404s in Search Console

### Redirect Management

- [ ] Old URLs redirect to new (301)
- [ ] No redirect chains (A → B → C)
- [ ] No redirect loops
- [ ] Use Rank Math's Redirect Manager or Redirection plugin

### Mobile Optimization

- [ ] Responsive design (all breakpoints)
- [ ] Touch targets at least 48x48px
- [ ] No horizontal scrolling
- [ ] Text readable without zooming
- [ ] Pass Google Mobile-Friendly Test

**Test:** https://search.google.com/test/mobile-friendly

### Structured Data Validation

- [ ] No errors in Google Rich Results Test
- [ ] No warnings (or explainable warnings)
- [ ] Schema matches page content

**Test:** https://search.google.com/test/rich-results

---

## Part 7: Monitoring & Maintenance

### Monthly Technical SEO Audit

**Search Console Review:**
- [ ] Check for crawl errors
- [ ] Review Core Web Vitals report
- [ ] Check for manual actions
- [ ] Review indexing status
- [ ] Check mobile usability

**Site Audit (Use Screaming Frog, Ahrefs, or Sitebulb):**
- [ ] Broken links (404s)
- [ ] Missing meta descriptions
- [ ] Missing alt text
- [ ] Redirect issues
- [ ] Duplicate content
- [ ] Page speed issues

**Performance Check:**
- [ ] Run PageSpeed Insights on key pages
- [ ] Check real user metrics in Search Console
- [ ] Monitor server response time

### Tools for Ongoing Monitoring

**Free:**
- Google Search Console (essential)
- Google Analytics 4 (site performance)
- Google PageSpeed Insights (manual checks)
- Screaming Frog (first 500 URLs free)

**Paid:**
- Ahrefs ($99+/mo) - backlinks, site audit, keywords
- SEMrush ($130+/mo) - all-in-one SEO
- Sitebulb ($35+/mo) - technical audits

### Quarterly Review

- [ ] Full site crawl with Screaming Frog
- [ ] Review all 404 errors and fix/redirect
- [ ] Check for new broken links
- [ ] Review/update robots.txt if needed
- [ ] Verify sitemap is up to date
- [ ] Review Core Web Vitals trends
- [ ] Update old content with new info

---

## Quick Reference Files

### robots.txt Location
`https://tbdesigned.io/robots.txt`
(Server root or managed by SEO plugin)

### Sitemap Location
`https://tbdesigned.io/sitemap_index.xml`
(Generated by Rank Math or Yoast)

### Key URLs to Monitor

| Page | URL | Notes |
|------|-----|-------|
| Homepage | / | Most important |
| Services | /services/ | Conversion page |
| Contact | /contact/ | Lead capture |
| Blog | /blog/ | Content hub |

---

## Implementation Checklist

### Day 1: Basics
- [ ] Install SEO plugin (Rank Math recommended)
- [ ] Configure robots.txt
- [ ] Enable XML sitemap
- [ ] Submit sitemap to Google Search Console
- [ ] Submit sitemap to Bing Webmaster Tools

### Day 2: Speed
- [ ] Install caching plugin
- [ ] Install image optimization plugin
- [ ] Run bulk image compression
- [ ] Set up Cloudflare CDN
- [ ] Run PageSpeed test, note baseline

### Day 3: Technical
- [ ] Verify SSL/HTTPS on all pages
- [ ] Check all pages have canonical tags
- [ ] Create custom 404 page
- [ ] Set up redirect monitoring
- [ ] Test mobile-friendliness

### Week 1: Optimization
- [ ] Optimize hero images (WebP, compressed)
- [ ] Enable lazy loading
- [ ] Minify CSS/JS
- [ ] Clean database
- [ ] Remove unused plugins/themes

### Ongoing
- [ ] Monthly Search Console review
- [ ] Quarterly full site audit
- [ ] Fix issues as they arise
- [ ] Monitor Core Web Vitals

---

*Last updated: March 2026*
