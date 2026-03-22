# TBDesigned.io Site Architecture

## Overview

TBDesigned is a web design agency specializing in Website-as-a-Service (WaaS) for home service businesses. The site needs to:
1. Convert visitors into booked discovery calls
2. Establish credibility and professionalism
3. Differentiate through the client portal experience
4. Support future agentic automation workflows

---

## Tech Stack

### Core Platform
- **CMS:** WordPress (self-hosted on Hostinger)
- **Page Builder:** Elementor Pro
- **Theme:** Hello Elementor (lightweight base)
- **Hosting:** Hostinger Business/Premium

### Key Plugins
| Plugin | Purpose |
|--------|---------|
| Elementor Pro | Page building, forms, popups |
| RankMath SEO | SEO optimization |
| WP Rocket | Caching & performance |
| Wordfence | Security |
| WPForms Lite | Backup contact forms |
| Calendly Embed | Booking integration |
| FluentCRM (optional) | Email automation |

### Client Dashboard (Phase 1 - Simple)
- **Solution:** WordPress + Custom Post Types + Frontend Dashboard Plugin
- **Plugins:** 
  - Ultimate Member OR WP-Members (client login)
  - Advanced Custom Fields Pro (custom fields for projects)
  - Frontend Dashboard (client-side access)

### Client Dashboard (Phase 2 - Advanced)
- Consider: Notion embed, Airtable, or custom React app
- API integration with WordPress for data sync

---

## Site Map

```
tbdesigned.io/
├── Home (/)
├── Services (/services)
│   └── Home Services WaaS (/services/home-services)
├── Portfolio (/portfolio)
│   └── [Individual Demo Sites]
├── About (/about)
├── Contact (/contact)
├── Blog (/blog)
│   └── [Individual Posts]
├── Client Portal (/client-portal) [protected]
│   ├── Dashboard (/client-portal/dashboard)
│   ├── My Project (/client-portal/project)
│   ├── Upload Files (/client-portal/upload)
│   ├── Approvals (/client-portal/approvals)
│   └── Support (/client-portal/support)
├── Privacy Policy (/privacy-policy)
└── Terms of Service (/terms-of-service)
```

---

## Page Structure Details

### 1. Homepage (/)
**Goal:** Convert visitors to booked calls

| Section | Purpose |
|---------|---------|
| Hero | Immediate value prop + CTA |
| Problem | Agitate pain points |
| Solution | Our approach |
| Who We Help | Industry verticals |
| How It Works | 3-step process |
| Pricing | Package comparison |
| Social Proof | Testimonials/logos |
| FAQ | Objection handling |
| Final CTA | Book a call |

**Key Elements:**
- Sticky header with phone number
- Floating "Book Call" button (mobile)
- Exit-intent popup (email capture)
- Live chat widget (Phase 2)

---

### 2. Services (/services)
**Goal:** Detail offerings, support SEO

| Section | Purpose |
|---------|---------|
| Overview | What we offer |
| Package Comparison | Visual comparison table |
| Feature Deep-Dive | What's included |
| Industry Specialization | Home services focus |
| Process Timeline | What to expect |
| Guarantee | Risk reversal |
| CTA | Book discovery call |

---

### 3. Portfolio (/portfolio)
**Goal:** Showcase work, build credibility

| Section | Purpose |
|---------|---------|
| Hero | "Our Work" intro |
| Filter Bar | By industry type |
| Project Grid | Thumbnails + titles |
| Individual Projects | Full case study format |

**Individual Project Page:**
- Client industry/type
- Challenge/goals
- Solution/approach
- Results (if available)
- Screenshots (desktop + mobile)
- Testimonial (if available)
- Link to live site (if permitted)

---

### 4. About (/about)
**Goal:** Build trust, humanize brand

| Section | Purpose |
|---------|---------|
| Hero | Mission statement |
| Our Story | Tyler's journey |
| Our Approach | How we work |
| Values | What we stand for |
| The Team | Tyler + future team |
| Why Home Services | Our focus area |
| CTA | Work with us |

---

### 5. Contact (/contact)
**Goal:** Multiple contact options

| Section | Purpose |
|---------|---------|
| Hero | "Let's Talk" |
| Calendly Embed | Primary booking |
| Contact Form | Secondary option |
| Direct Contact | Phone, email |
| FAQ | Quick questions |
| Map | Service area (optional) |

---

### 6. Blog (/blog)
**Goal:** SEO, thought leadership

**Initial Categories:**
- Website Tips for Home Services
- Local SEO Strategies
- Case Studies
- Industry News

**Starter Posts (to create):**
1. "5 Website Mistakes Costing Landscapers Jobs"
2. "Why Home Service Businesses Need Mobile-First Websites"
3. "How to Get More Reviews on Google Business Profile"

---

### 7. Client Portal (/client-portal)
**Goal:** Differentiate, streamline client experience

See: `/website/dashboard/portal-spec.md`

---

## Design System

### Colors
| Use | Color | Hex |
|-----|-------|-----|
| Primary | Deep Blue | #1E3A5F |
| Secondary | Teal Green | #2DD4BF |
| Accent | Orange | #F97316 |
| Dark | Charcoal | #1F2937 |
| Light | Off-White | #F9FAFB |
| Body Text | Gray | #374151 |

### Typography
- **Headlines:** Inter or Poppins (bold, clean)
- **Body:** Inter or Open Sans (readable)
- **Sizes:** Mobile-first scaling

### UI Components
- Rounded corners (8px standard)
- Subtle shadows
- Clear CTAs (orange buttons)
- Plenty of whitespace
- Professional stock photos (workers, homes, results)

---

## SEO Strategy

### Target Keywords
| Priority | Keyword | Page |
|----------|---------|------|
| Primary | web design for landscapers | Services |
| Primary | home service business website | Home |
| Primary | website for cleaning company | Services |
| Secondary | landscaping website design | Services |
| Secondary | contractor website builder | Services |
| Long-tail | pressure washing website examples | Portfolio |

### Technical SEO
- XML sitemap (RankMath)
- Schema markup (LocalBusiness, Service)
- Core Web Vitals optimization
- Mobile-responsive design
- Fast hosting + caching
- SSL certificate

### Local SEO
- Google Business Profile integration
- Local citations (Phase 2)
- NAP consistency

---

## Conversion Optimization

### Primary CTA
Book a 15-minute discovery call (Calendly)

### Secondary CTAs
- Get pricing guide (email capture)
- See our work (portfolio)
- Call now (click-to-call)

### Trust Signals
- Testimonials
- Portfolio examples
- "100+ Websites Built" counter (update as grows)
- Secure badges
- Money-back guarantee messaging

### Forms
- Minimal fields (name, email, phone, service type)
- Clear privacy statement
- Immediate confirmation + email

---

## Future Integrations (Agentic Workflows)

### Onboarding Automation
```
New Client Signs → 
  Airtable/Notion record created →
  Welcome email sequence triggered →
  Client portal account provisioned →
  Onboarding questionnaire sent →
  Responses populate project brief
```

### Status Updates
```
Project milestone completed →
  Client portal status updated →
  Automated email notification →
  Dashboard timeline progresses
```

### AI Content Generation
```
Client completes questionnaire →
  AI generates draft website copy →
  Designer reviews/edits →
  Copy populates site build
```

### Cold Email Integration
```
Lead comes from cold email →
  UTM tracking captures source →
  CRM tags lead appropriately →
  Follow-up sequence customized
```

---

## Performance Targets

| Metric | Target |
|--------|--------|
| PageSpeed (Mobile) | 90+ |
| PageSpeed (Desktop) | 95+ |
| Time to First Byte | <200ms |
| Largest Contentful Paint | <2.5s |
| Cumulative Layout Shift | <0.1 |

---

## Launch Checklist

### Pre-Launch
- [ ] All pages built and reviewed
- [ ] Mobile responsiveness tested
- [ ] Forms tested and notifications working
- [ ] Calendly integration live
- [ ] SEO settings configured
- [ ] Analytics installed (GA4)
- [ ] Backup plugin configured
- [ ] Security plugin configured
- [ ] Privacy Policy & Terms live
- [ ] 404 page created
- [ ] Favicon uploaded

### Launch Day
- [ ] DNS pointed to new hosting
- [ ] SSL certificate active
- [ ] All redirects in place
- [ ] Submit sitemap to Google
- [ ] Test all forms again
- [ ] Check load speed
- [ ] Announce on social

### Post-Launch
- [ ] Monitor for errors
- [ ] Set up uptime monitoring
- [ ] Weekly backup verification
- [ ] Begin content/SEO work

---

## File Organization

```
/website/
├── architecture/
│   └── site-architecture.md (this file)
├── content/
│   ├── homepage.md
│   ├── services.md
│   ├── portfolio.md
│   ├── about.md
│   ├── contact.md
│   └── blog-posts/
├── dashboard/
│   ├── portal-spec.md
│   └── wireframes/
└── assets/
    ├── brand-guidelines.md
    └── image-list.md
```
