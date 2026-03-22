# TBDesigned Website Implementation Plan

## Overview

This document outlines the step-by-step technical implementation plan for building the TBDesigned website on WordPress + Elementor, including the client portal.

**Timeline:** 2-3 weeks  
**Platform:** WordPress (Hostinger)  
**Builder:** Elementor Pro  
**Domain:** tbdesigned.io (already owned)

---

## Phase 1: Environment Setup (Day 1)

### 1.1 Hosting Configuration
- [ ] Log into Hostinger panel
- [ ] Verify WordPress installation
- [ ] Update PHP to 8.1+ 
- [ ] Increase memory limit (256MB minimum)
- [ ] Enable OPcache
- [ ] Configure SSL certificate
- [ ] Set up staging environment (optional)

### 1.2 WordPress Setup
- [ ] Update WordPress to latest version
- [ ] Remove default themes (keep one backup)
- [ ] Remove default plugins
- [ ] Install Hello Elementor theme
- [ ] Set permalink structure to "Post name"
- [ ] Configure timezone (America/New_York)
- [ ] Set site title and tagline

### 1.3 Essential Plugins Installation

**Core Plugins:**
```
Elementor Pro (license required)
Advanced Custom Fields Pro (license required)
RankMath SEO (free)
WP Rocket (license) or LiteSpeed Cache (free if Hostinger)
Wordfence Security (free)
UpdraftPlus (free - backups)
WP Mail SMTP (free)
```

**Client Portal Plugins:**
```
Ultimate Member (free or Pro)
Members (free - role management)
```

**Utility Plugins:**
```
Redirection (free - 301 redirects)
Broken Link Checker (free)
Smush or ShortPixel (image optimization)
Code Snippets (custom PHP)
```

### 1.4 Plugin Configuration
- [ ] Activate Elementor Pro license
- [ ] Activate ACF Pro license
- [ ] Configure RankMath setup wizard
- [ ] Configure WP Rocket settings
- [ ] Set up Wordfence security
- [ ] Configure backup schedule (UpdraftPlus)
- [ ] Set up SMTP for email delivery

---

## Phase 2: Theme & Design System (Day 2)

### 2.1 Elementor Global Settings

**Colors:**
```
Primary: #1E3A5F (Deep Blue)
Secondary: #2DD4BF (Teal)
Accent: #F97316 (Orange)
Text: #1F2937 (Dark Gray)
Text Secondary: #6B7280 (Medium Gray)
Background: #F9FAFB (Off-White)
```

**Typography:**
```
Primary Font: Inter (Google Fonts)
Secondary Font: Poppins (headlines - optional)

Body: Inter, 16px, 400 weight, 1.6 line-height
H1: Inter, 48px (desktop) / 32px (mobile), 700 weight
H2: Inter, 36px (desktop) / 28px (mobile), 700 weight
H3: Inter, 28px (desktop) / 24px (mobile), 600 weight
H4: Inter, 22px (desktop) / 20px (mobile), 600 weight
Links: Primary color, underline on hover
```

**Buttons:**
```
Primary: Orange background (#F97316), white text, 8px radius
Secondary: Transparent, blue border, blue text
Padding: 16px 32px
Font: 16px, 600 weight
Hover: Darken 10%
```

### 2.2 Create Elementor Templates

**Header Template:**
- [ ] Logo (left)
- [ ] Navigation menu (center)
- [ ] Phone number + Book Call button (right)
- [ ] Mobile hamburger menu
- [ ] Sticky on scroll

**Footer Template:**
- [ ] Logo and tagline
- [ ] Quick links
- [ ] Contact info
- [ ] Social icons
- [ ] Copyright
- [ ] Privacy/Terms links

**Single Post Template:**
- [ ] Post title and meta
- [ ] Featured image
- [ ] Content area
- [ ] Author box (optional)
- [ ] Related posts
- [ ] CTA section

---

## Phase 3: Page Development (Days 3-7)

### 3.1 Homepage
**Sections to build:**
1. Hero (full-width, background image, headline, CTAs)
2. Problem section (text-focused)
3. Solution section (icon cards)
4. Industries section (icon grid)
5. How It Works (3-step timeline)
6. Pricing (3-column cards)
7. Testimonials (carousel or grid)
8. FAQ (accordion)
9. Final CTA (dark background)

**Integrations:**
- [ ] Calendly embed popup for "Book Call" buttons
- [ ] Click-to-call for phone numbers

### 3.2 Services Page
**Sections to build:**
1. Hero
2. Service overview cards
3. Package comparison table
4. Starter package details
5. Growth package details
6. Professional package details
7. Industry specializations
8. Process timeline
9. Add-on services table
10. Guarantee section
11. FAQ section
12. CTA section

### 3.3 Portfolio Page
**Sections to build:**
1. Hero
2. Filter bar (Elementor Portfolio widget)
3. Project grid (linked to project pages)
4. Metrics/stats section
5. Testimonials
6. CTA section

**Create:**
- [ ] Portfolio single template (case study layout)
- [ ] 4-6 demo project pages

### 3.4 About Page
**Sections to build:**
1. Hero
2. Mission statement
3. Our Story
4. Founder bio with photo
5. Values cards
6. Why Home Services
7. CTA section

### 3.5 Contact Page
**Sections to build:**
1. Hero
2. Two-column layout (Calendly + contact info)
3. Contact form
4. FAQ mini-section
5. Map (optional)

**Integrations:**
- [ ] Calendly embed (inline)
- [ ] Elementor form → email notifications
- [ ] Click-to-call phone

### 3.6 Blog Setup
- [ ] Blog archive page
- [ ] Category pages
- [ ] Single post template
- [ ] 3 starter blog posts

### 3.7 Legal Pages
- [ ] Privacy Policy
- [ ] Terms of Service
- [ ] 404 Error page

---

## Phase 4: Client Portal Development (Days 8-12)

### 4.1 Custom Post Types (ACF)

**Create Post Types:**
```php
// In functions.php or Code Snippets plugin

// Projects
register_post_type('tbdesigned_project', [
    'labels' => ['name' => 'Projects'],
    'public' => false,
    'show_ui' => true,
    'supports' => ['title'],
    'menu_icon' => 'dashicons-portfolio'
]);

// Milestones
register_post_type('tbdesigned_milestone', [
    'labels' => ['name' => 'Milestones'],
    'public' => false,
    'show_ui' => true,
    'supports' => ['title']
]);

// Deliverables
register_post_type('tbdesigned_deliverable', [
    'labels' => ['name' => 'Deliverables'],
    'public' => false,
    'show_ui' => true,
    'supports' => ['title']
]);

// Support Tickets
register_post_type('tbdesigned_ticket', [
    'labels' => ['name' => 'Support Tickets'],
    'public' => false,
    'show_ui' => true,
    'supports' => ['title']
]);
```

### 4.2 ACF Field Groups

**Project Fields:**
- client_user (User)
- client_company (Text)
- project_status (Select)
- start_date (Date)
- target_launch_date (Date)
- actual_launch_date (Date)
- wp_admin_url (URL)
- wp_username (Text)
- wp_password (Text - encrypted)
- hosting_info (Textarea)
- domain_info (Textarea)
- notes (Textarea)

**Milestone Fields:**
- project (Relationship → Project)
- phase_number (Number)
- description (Textarea)
- status (Select: Upcoming/In Progress/Completed)
- due_date (Date)
- completed_date (Date)
- requires_approval (True/False)
- approved (True/False)
- approved_by (Text)
- approved_date (Date)

**Deliverable Fields:**
- project (Relationship → Project)
- milestone (Relationship → Milestone)
- description (Textarea)
- file (File)
- preview_url (URL)
- status (Select)
- client_feedback (Textarea)
- submitted_date (Date)
- approved_date (Date)

**Ticket Fields:**
- project (Relationship → Project)
- ticket_type (Select)
- priority (Select)
- description (Textarea)
- attachment (File)
- status (Select)
- response (Textarea)
- submitted_date (Date)
- resolved_date (Date)

### 4.3 Ultimate Member Setup

**User Role:**
- Create "Client" role
- Restrict to portal pages only
- Disable admin bar

**Forms:**
- Registration form (disabled - admin creates accounts)
- Login form
- Password reset

**Pages:**
- /client-portal (login redirect)
- /client-portal/login
- /client-portal/password-reset

### 4.4 Portal Page Templates

**Dashboard (/client-portal/dashboard):**
```
[um_show_content roles="client,administrator"]
  <!-- Elementor template with ACF dynamic content -->
  - Welcome message (current user display name)
  - Project status card (query user's project)
  - Action items (pending approvals, etc.)
  - Recent activity feed
  - Quick link cards
[/um_show_content]

[um_show_content not="client,administrator"]
  [um_loggedin show_lock=yes]
  You don't have access to this area.
  [/um_loggedin]
[/um_show_content]
```

**Timeline (/client-portal/project):**
- Query milestones for user's project
- Display as visual timeline
- Expandable phase details

**Files (/client-portal/files):**
- Upload form (Elementor form or WPForms)
- Display uploaded files (ACF repeater or CPT)
- Category filter

**Review (/client-portal/review):**
- Query pending deliverables
- Approval/feedback forms
- History of approved items

**Support (/client-portal/support):**
- Ticket submission form
- List of user's tickets
- Ticket detail modal/page

**Credentials (/client-portal/credentials):**
- Conditional: only show if project launched
- Display credentials from project CPT
- Security messaging

### 4.5 Email Notifications

**Using WP Mail SMTP + Custom Templates:**

```php
// Hook into form submissions
add_action('elementor_pro/forms/new_record', function($record) {
    // Check form name
    // Send appropriate notification
});

// Hook into ACF saves
add_action('acf/save_post', function($post_id) {
    // Check if deliverable status changed
    // Send notification to client
});
```

**Email Templates Needed:**
- Welcome email
- New deliverable ready
- Milestone completed
- Approval received (to admin)
- Support ticket response
- Launch notification

---

## Phase 5: Testing & Optimization (Days 13-14)

### 5.1 Functionality Testing
- [ ] All forms submit correctly
- [ ] Email notifications working
- [ ] Calendly integration working
- [ ] Click-to-call working on mobile
- [ ] Client portal login works
- [ ] Portal displays correct project data
- [ ] File uploads work
- [ ] Approvals record correctly
- [ ] Support tickets create properly

### 5.2 Cross-Browser Testing
- [ ] Chrome
- [ ] Safari
- [ ] Firefox
- [ ] Edge
- [ ] Mobile Safari (iOS)
- [ ] Chrome Mobile (Android)

### 5.3 Mobile Responsiveness
- [ ] All pages on iPhone (small)
- [ ] All pages on iPad (medium)
- [ ] All pages on desktop
- [ ] Touch targets 44px minimum
- [ ] No horizontal scroll

### 5.4 Performance Optimization
- [ ] Run PageSpeed Insights
- [ ] Optimize images (compression, WebP)
- [ ] Enable caching (WP Rocket)
- [ ] Minify CSS/JS
- [ ] Lazy load images
- [ ] Target: 90+ mobile, 95+ desktop

### 5.5 SEO Checks
- [ ] RankMath all pages green
- [ ] Meta titles under 60 chars
- [ ] Meta descriptions 150-160 chars
- [ ] All images have alt text
- [ ] XML sitemap generated
- [ ] Robots.txt configured
- [ ] Schema markup added

### 5.6 Security Checks
- [ ] Wordfence scan clean
- [ ] Admin URL protected
- [ ] Strong passwords enforced
- [ ] File permissions correct
- [ ] SSL certificate active
- [ ] Backup running

---

## Phase 6: Launch (Day 15)

### 6.1 Pre-Launch Checklist
- [ ] Final content review
- [ ] All placeholder text replaced
- [ ] Contact info correct
- [ ] Legal pages live
- [ ] Backup created
- [ ] Analytics installed

### 6.2 DNS & Go Live
- [ ] Point domain to Hostinger
- [ ] Verify SSL working
- [ ] Test all pages
- [ ] Test all forms
- [ ] Clear all caches

### 6.3 Post-Launch
- [ ] Submit sitemap to Google Search Console
- [ ] Verify Google Business Profile
- [ ] Monitor for errors (24-48 hours)
- [ ] Set up uptime monitoring
- [ ] Announce launch

---

## Ongoing Maintenance

### Weekly
- [ ] Check for WordPress/plugin updates
- [ ] Review security logs
- [ ] Verify backups completed

### Monthly
- [ ] Run security scan
- [ ] Check PageSpeed scores
- [ ] Review Search Console
- [ ] Update content as needed
- [ ] Test forms

### Quarterly
- [ ] Full security audit
- [ ] Performance review
- [ ] Content refresh
- [ ] Plugin audit (remove unused)

---

## Required Licenses & Costs

| Item | Cost | Frequency |
|------|------|-----------|
| Elementor Pro | $59 | Annual |
| ACF Pro | $49 | Annual |
| WP Rocket | $59 | Annual |
| Ultimate Member Pro (optional) | $249 | Annual |
| Hostinger Business | ~$48 | Annual |
| **Total** | ~$464 | Annual |

*Note: Can start with free versions where available to reduce initial costs*

---

## Files & Resources

### Content Files
- `/website/content/homepage.md`
- `/website/content/services.md`
- `/website/content/portfolio.md`
- `/website/content/about.md`
- `/website/content/contact.md`
- `/website/content/blog-posts/starter-posts.md`

### Architecture Files
- `/website/architecture/site-architecture.md`
- `/website/architecture/implementation-plan.md` (this file)

### Dashboard Files
- `/website/dashboard/portal-spec.md`
- `/website/dashboard/wireframes/wireframes-description.md`

### Assets Needed
- TBDesigned logo (PNG + SVG)
- Favicon (512x512 + smaller sizes)
- Hero images (1920x1080 minimum)
- Tyler headshot
- Service industry icons
- Testimonial photos (when available)
