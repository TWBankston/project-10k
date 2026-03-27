# Google Ads Preparation Guide for TBDesigned.io

Comprehensive prep work for future Google Ads campaigns. Do this setup BEFORE spending any ad budget.

---

## Part 1: Account Setup

### Create Google Ads Account

1. Go to https://ads.google.com
2. Sign in with Google account (recommend: ash.tbdesigned.io@gmail.com)
3. Click **Start Now**
4. Choose **Switch to Expert Mode** (bottom of screen)
5. Click **Create an account without a campaign**
6. Confirm business info:
   - Country: United States
   - Time zone: Eastern Time
   - Currency: USD
7. Submit

### Link Accounts

1. **Link to GA4:**
   - Google Ads > Tools & Settings > Setup > Linked accounts
   - Click Google Analytics (GA4)
   - Find TBDesigned.io property
   - Link and enable auto-tagging

2. **Link to Google Search Console:**
   - Tools & Settings > Setup > Linked accounts
   - Click Search Console
   - Link verified property

3. **Link to GTM (already done via tags)**

---

## Part 2: Conversion Tracking Setup

### Create Conversions in Google Ads

Go to Tools & Settings > Measurement > Conversions > New conversion action

#### Conversion 1: Lead Form Submission (Primary)

1. Click **Website**
2. Enter URL: `https://tbdesigned.io`
3. Scan (or skip and set up manually)
4. Click **Add a conversion action manually**
5. Settings:
   - Conversion name: `Lead - Form Submission`
   - Goal category: `Submit lead form`
   - Value: `Use different values for each conversion` OR `$50` (fixed)
   - Count: `One` (one conversion per click)
   - Click-through conversion window: `30 days`
   - View-through conversion window: `1 day`
   - Attribution model: `Data-driven` (or Time decay)
6. Save

#### Conversion 2: Phone Call Click

1. New conversion action > Website
2. Settings:
   - Conversion name: `Lead - Phone Click`
   - Goal category: `Phone call leads`
   - Value: `$30`
   - Count: `One`
7. Save

#### Conversion 3: Email Click

1. New conversion action > Website
2. Settings:
   - Conversion name: `Lead - Email Click`
   - Goal category: `Submit lead form`
   - Value: `$20`
   - Count: `One`
8. Save

### Get Conversion Tag Details

For each conversion, copy:
- **Conversion ID:** `AW-XXXXXXXXX`
- **Conversion Label:** `XXXXXXXXXXXX`

You'll add these to GTM (see gtm-setup.md).

### Import GA4 Conversions (Alternative)

Instead of creating separate conversions:

1. Tools & Settings > Measurement > Conversions
2. Click **Import**
3. Select **Google Analytics 4 properties**
4. Select `generate_lead`, `phone_click`, `email_click`
5. Import

This syncs your GA4 events as Google Ads conversions automatically.

---

## Part 3: Keyword Research (Free Methods)

### Using Google Keyword Planner

1. Go to Tools & Settings > Planning > Keyword Planner
2. Click **Discover new keywords**
3. Enter seed keywords and review results

### Seed Keywords to Research

Enter these one category at a time:

**Core Service Keywords:**
```
contractor website design
website for contractors
home service website
small business website
```

**Industry Keywords:**
```
landscaping website design
cleaning company website
HVAC website design
plumber website design
electrician website design
roofing website design
```

**Local Keywords:**
```
web design Asheville NC
website designer Houston
website design Tampa
web designer Dallas
```

### Record Keyword Data

For each promising keyword, note:

| Keyword | Avg Monthly Searches | Competition | Low Bid | High Bid |
|---------|---------------------|-------------|---------|----------|
| contractor website design | 100-1K | Medium | $5.00 | $20.00 |
| landscaping website | 100-1K | Low | $3.00 | $12.00 |
| ... | ... | ... | ... | ... |

### Keyword Categories for Campaigns

**Campaign 1: General Contractor Websites**
- contractor website design
- website for contractors
- contractor web design
- home service website design
- small contractor website

**Campaign 2: Landscaping Websites**
- landscaping website design
- landscape company website
- lawn care website
- landscaper website template
- landscaping business website

**Campaign 3: Cleaning Company Websites**
- cleaning company website
- cleaning service website design
- house cleaning website
- maid service website
- janitorial company website

**Campaign 4: HVAC Websites**
- HVAC website design
- HVAC company website
- heating cooling website
- air conditioning company website
- HVAC contractor website

**Campaign 5: Plumbing Websites**
- plumber website design
- plumbing company website
- plumber website template
- plumbing business website
- plumber web design

**Campaign 6: Electrical Websites**
- electrician website design
- electrical contractor website
- electrician website template
- electrical company website
- electrician web design

### Negative Keywords List

Add these to all campaigns to avoid wasted spend:

```
free
template
wix
squarespace
wordpress theme
diy
tutorial
how to
course
class
example
sample
cheap
do it yourself
jobs
career
hiring
salary
```

---

## Part 4: Landing Page Requirements

### Landing Page Checklist

For each campaign, create (or use) a dedicated landing page that:

**Above the Fold:**
- [ ] Clear headline with target keyword
- [ ] Subheadline explaining value prop
- [ ] Hero image relevant to industry
- [ ] Primary CTA button (visible without scrolling)
- [ ] Trust indicator (review stars, "trusted by X contractors")

**Body Content:**
- [ ] 3-5 benefits (not features)
- [ ] Social proof (testimonials from that industry if possible)
- [ ] Portfolio examples from that industry
- [ ] Simple pricing or "starting at" price
- [ ] FAQ section addressing common objections

**Conversion Elements:**
- [ ] Contact form (short - name, email, phone, message)
- [ ] Phone number (click-to-call)
- [ ] Chat widget (optional)
- [ ] Secondary CTA at bottom

**Technical Requirements:**
- [ ] Mobile-responsive (most clicks are mobile)
- [ ] Fast loading (<3 seconds)
- [ ] SSL certificate (HTTPS)
- [ ] Clear privacy policy link
- [ ] No navigation distractions (optional: remove header nav)

### Recommended Landing Page URLs

| Campaign | Landing Page URL |
|----------|------------------|
| General | tbdesigned.io/services/ |
| Landscaping | tbdesigned.io/services/landscaping-websites/ |
| Cleaning | tbdesigned.io/services/cleaning-company-websites/ |
| HVAC | tbdesigned.io/services/hvac-websites/ |
| Plumbing | tbdesigned.io/services/plumber-websites/ |
| Electrical | tbdesigned.io/services/electrician-websites/ |

---

## Part 5: Ad Copy Suggestions

### Ad Copy Structure

**Headline 1 (30 chars):** Primary keyword + benefit
**Headline 2 (30 chars):** Value proposition
**Headline 3 (30 chars):** Call to action
**Description 1 (90 chars):** Expand on benefits, include keyword
**Description 2 (90 chars):** Social proof or differentiation

### General Contractor Ads

**Ad Set 1:**
```
Headline 1: Contractor Website Design
Headline 2: Get More Leads Online
Headline 3: Free Consultation Today
Description 1: Professional websites that bring in leads for home service contractors. Mobile-friendly & SEO-ready.
Description 2: Join 100+ contractors who've upgraded their online presence. Starting at $1,500.
```

**Ad Set 2:**
```
Headline 1: Websites for Contractors
Headline 2: Built to Convert Visitors
Headline 3: See Our Portfolio
Description 1: Stop losing leads to competitors with better websites. We build sites that work for you 24/7.
Description 2: Fast turnaround, fair pricing, results guaranteed. Get your free quote today.
```

### Landscaping Ads

**Ad Set 1:**
```
Headline 1: Landscaping Website Design
Headline 2: Showcase Your Best Work
Headline 3: Get More Landscaping Jobs
Description 1: Beautiful portfolio websites for landscapers. Show off your projects and capture leads automatically.
Description 2: Mobile-responsive, SEO-optimized, built to convert. Starting at $1,500. Free consultation.
```

**Ad Set 2:**
```
Headline 1: Landscaper Website | $1,500
Headline 2: Professional & Affordable
Headline 3: Launch in 2-3 Weeks
Description 1: Your landscaping deserves a website that matches. Portfolio galleries, contact forms, Google-ready.
Description 2: We've helped landscapers across the US grow their businesses online. You're next.
```

### Cleaning Company Ads

**Ad Set 1:**
```
Headline 1: Cleaning Company Website
Headline 2: Book More Cleaning Jobs
Headline 3: Professional Web Design
Description 1: Websites that make hiring your cleaning service easy. Online booking, quote requests, and more.
Description 2: Trusted by cleaning companies nationwide. Mobile-friendly, fast loading. Get your free quote.
```

### HVAC Ads

**Ad Set 1:**
```
Headline 1: HVAC Website Design
Headline 2: More Calls, More Jobs
Headline 3: Free Consultation
Description 1: Professional websites for HVAC contractors. Emergency service pages, quote forms, and SEO built in.
Description 2: Stop losing customers to competitors with better websites. Starting at $1,500.
```

### Ad Extensions to Add

**Sitelink Extensions:**
- Portfolio | See our work
- Pricing | Starting at $1,500
- About Us | Meet the team
- Contact | Get a free quote

**Callout Extensions:**
- Mobile-Responsive
- SEO Included
- 2-3 Week Turnaround
- Free Consultation
- Satisfaction Guaranteed

**Structured Snippet:**
- Services: Website Design, SEO, Lead Generation, Portfolio Sites

**Call Extension:**
- Add phone number for click-to-call

**Location Extension:**
- Link Google Business Profile (after setup)

---

## Part 6: Remarketing Audience Setup

### Create Audiences in Google Ads

Go to Tools & Settings > Shared library > Audience manager

#### Audience 1: All Website Visitors

1. Click **+** > **Website visitors**
2. Name: `All Website Visitors`
3. List members: `Visitors of a page`
4. Visited page URL contains: `tbdesigned.io`
5. Membership duration: `90 days`
6. Save

#### Audience 2: Service Page Visitors

1. **+** > **Website visitors**
2. Name: `Service Page Visitors`
3. Visited page URL contains: `/services`
4. Membership duration: `30 days`
5. Save

#### Audience 3: Contact Page Visitors (No Conversion)

1. **+** > **Website visitors**
2. Name: `Contact Page - No Submission`
3. Visited page URL contains: `/contact`
4. Membership duration: `14 days`
5. Save
6. Later: Exclude converters from this audience

#### Audience 4: Converters (Form Submitters)

1. **+** > **Website visitors**
2. Name: `Converters - Form Submission`
3. Based on conversion action: `Lead - Form Submission`
4. Membership duration: `540 days`
5. Save

### Remarketing Campaign Structure (For Later)

**Campaign: Remarketing - Service Page Visitors**
- Audience: Service Page Visitors (exclude Converters)
- Ad: "Still Looking for a Website? Let's Talk"
- Budget: $5-10/day

**Campaign: Remarketing - Contact Abandoners**
- Audience: Contact Page - No Submission (exclude Converters)
- Ad: "Have Questions? We're Here to Help"
- Budget: $3-5/day

---

## Part 7: Budget Planning

### Recommended Starting Budgets

| Campaign Type | Daily Budget | Monthly Budget |
|---------------|--------------|----------------|
| Search - General | $10-20 | $300-600 |
| Search - Industry Specific | $5-10 each | $150-300 each |
| Remarketing | $5-10 | $150-300 |

### Cost Per Acquisition Targets

Based on pricing ($1,500-5,000/project):
- **Target CPA:** $50-150 per lead
- **Expected conversion rate:** 5-15% (lead to client)
- **Acceptable cost per client:** $500-1,500

### Scaling Strategy

**Phase 1: Test ($300-500/month)**
- Run 1-2 campaigns
- Test ad copy variations
- Establish baseline metrics

**Phase 2: Optimize ($500-1,000/month)**
- Pause underperforming keywords
- Add converting search terms
- Improve landing pages

**Phase 3: Scale ($1,000+/month)**
- Add industry-specific campaigns
- Launch remarketing
- Test display/YouTube

---

## Part 8: Campaign Settings Checklist

When creating campaigns, use these settings:

### Search Campaign Settings

- **Campaign type:** Search
- **Networks:** ✅ Google Search, ❌ Search Partners, ❌ Display
- **Locations:** United States (or specific states/cities)
- **Location options:** People in or regularly in locations
- **Languages:** English
- **Bidding:** Maximize conversions (start here, switch to Target CPA later)
- **Budget:** Start conservative ($10-20/day)
- **Ad rotation:** Optimize (let Google pick winners)
- **Ad schedule:** All day (optimize later with data)
- **Start/end date:** No end date

### Ad Group Settings

- **1 ad group per theme** (similar keywords together)
- **10-20 keywords per ad group** (max)
- **Match types:** Phrase match and exact match (avoid broad initially)
- **3-5 ads per ad group** (for testing)

---

## Part 9: Quality Score Optimization

### What Affects Quality Score

1. **Expected CTR:** How likely your ad gets clicked
2. **Ad Relevance:** How well ad matches keyword intent
3. **Landing Page Experience:** Quality, relevance, speed

### Optimization Tips

**For Better CTR:**
- Include keyword in headlines
- Add numbers (pricing, stats)
- Use strong CTAs
- Test multiple ad variations

**For Better Ad Relevance:**
- Match ad copy to keyword themes
- Use keyword insertion (carefully)
- Create tightly themed ad groups

**For Better Landing Page:**
- Fast load time (<3s)
- Mobile optimized
- Keyword in headline
- Clear CTA above fold
- Relevant content to ad

---

## Part 10: Launch Checklist

Before spending any budget:

### Pre-Launch

- [ ] Google Ads account created
- [ ] Linked to GA4
- [ ] Linked to Search Console
- [ ] Conversions created and tracking
- [ ] GTM tags set up for conversions
- [ ] Landing pages live and tested
- [ ] Ad copy written and reviewed
- [ ] Keywords researched and organized
- [ ] Negative keywords added
- [ ] Remarketing audiences created
- [ ] Extensions added (sitelinks, callouts)
- [ ] Budget confirmed

### Launch Day

- [ ] Create campaign with settings above
- [ ] Add ad groups and keywords
- [ ] Add ads
- [ ] Enable campaign
- [ ] Test conversion tracking (submit test form)
- [ ] Set up automated rules or alerts (optional)

### First Week

- [ ] Check daily for disapproved ads
- [ ] Monitor search terms report
- [ ] Add negative keywords as needed
- [ ] Check conversion tracking is working
- [ ] Review Quality Score

### First Month

- [ ] Pause low-performing keywords (< 2% CTR, no conversions)
- [ ] Add high-performing search terms as keywords
- [ ] Test new ad variations
- [ ] Optimize bids based on conversion data
- [ ] Review and adjust budget

---

## Quick Reference

### Account IDs (Fill After Setup)

- **Google Ads Customer ID:** XXX-XXX-XXXX
- **Conversion ID:** AW-XXXXXXXXX
- **Form Submission Label:** XXXXXXXXXXXX
- **Phone Click Label:** XXXXXXXXXXXX
- **Email Click Label:** XXXXXXXXXXXX

### Key Metrics to Track

| Metric | Target |
|--------|--------|
| CTR | >5% |
| Conversion Rate | >5% |
| Cost Per Lead | <$100 |
| Quality Score | >7 |
| Impression Share | >50% |

---

*Last updated: March 2026*
*Do NOT launch campaigns until landing pages and tracking are 100% ready.*
