# Google Analytics 4 Setup Guide for TBDesigned.io

Complete step-by-step guide to set up GA4 for tracking website performance and lead generation.

---

## Part 1: Create GA4 Property

### Step 1: Access Google Analytics
1. Go to https://analytics.google.com
2. Sign in with the Google account you want to use (recommend: ash.tbdesigned.io@gmail.com)

### Step 2: Create Account (if needed)
1. Click **Admin** (gear icon, bottom left)
2. Click **Create Account**
3. Account name: `TBDesigned`
4. Check desired data sharing options
5. Click **Next**

### Step 3: Create Property
1. Property name: `TBDesigned.io`
2. Time zone: `Eastern Time (US & Canada)`
3. Currency: `US Dollar ($)`
4. Click **Next**

### Step 4: Business Details
1. Industry: `Business & Industrial`
2. Business size: `Small (1-10 employees)`
3. Click **Next**

### Step 5: Business Objectives
Select all that apply:
- ✅ Generate leads
- ✅ Drive online sales (optional, for future)
- ✅ Raise brand awareness
- ✅ Examine user behavior

Click **Create**

### Step 6: Accept Terms
Accept the Google Analytics Terms of Service

---

## Part 2: Install GA4 on WordPress

### Option A: Using Google Site Kit Plugin (Recommended)

1. **Install Plugin:**
   - WordPress Admin > Plugins > Add New
   - Search "Site Kit by Google"
   - Install and Activate

2. **Connect Google Account:**
   - Go to Site Kit > Dashboard
   - Click "Sign in with Google"
   - Select your Google account
   - Grant permissions

3. **Connect Analytics:**
   - Site Kit will detect your GA4 property
   - Select `TBDesigned.io` property
   - Click "Configure Analytics"

4. **Verify Installation:**
   - Site Kit dashboard will show connection status
   - Wait 24-48 hours for data to appear

### Option B: Manual Installation (If not using Site Kit)

1. **Get Measurement ID:**
   - GA4 > Admin > Data Streams
   - Click on your web stream
   - Copy Measurement ID (looks like: `G-XXXXXXXXXX`)

2. **Install via Code:**
   - Go to Appearance > Theme File Editor
   - Open `header.php`
   - Paste this code right after `<head>`:

```html
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXXXXXXX');
</script>
```

3. **Replace `G-XXXXXXXXXX`** with your actual Measurement ID

### Option C: Using Header/Footer Plugin

1. Install "Insert Headers and Footers" plugin
2. Go to Settings > Insert Headers and Footers
3. Paste GA4 code in the Header section
4. Save

---

## Part 3: Configure Data Stream

### Access Data Stream Settings
1. GA4 > Admin > Data Streams
2. Click on your web stream (tbdesigned.io)

### Enhanced Measurement (Enable All)
These are automatically tracked:
- ✅ Page views
- ✅ Scrolls (90% scroll depth)
- ✅ Outbound clicks
- ✅ Site search
- ✅ Video engagement
- ✅ File downloads
- ✅ Form interactions (partial)

Click the toggle to enable Enhanced Measurement if not already on.

---

## Part 4: Set Up Key Events (Conversions)

### Events to Track

| Event Name | Trigger | Priority |
|------------|---------|----------|
| `form_submit` | Contact form submitted | HIGH |
| `phone_click` | Click on phone number | HIGH |
| `email_click` | Click on email link | MEDIUM |
| `cta_click` | Click on CTA buttons | MEDIUM |
| `scroll_90` | Scroll 90% of page | LOW |
| `page_view_services` | View services page | LOW |

### Create Custom Events in GA4

#### Event 1: Form Submission
1. Go to Admin > Events
2. Click **Create Event**
3. Event name: `generate_lead`
4. Matching conditions:
   - Parameter: `event_name`
   - Operator: `equals`
   - Value: `form_submit`
5. Click **Create**

#### Event 2: Phone Click
1. Create Event
2. Event name: `phone_click`
3. Matching conditions:
   - Parameter: `link_url`
   - Operator: `contains`
   - Value: `tel:`
5. Click **Create**

#### Event 3: Email Click
1. Create Event
2. Event name: `email_click`
3. Matching conditions:
   - Parameter: `link_url`
   - Operator: `contains`
   - Value: `mailto:`
5. Click **Create**

### Mark Events as Conversions
1. Go to Admin > Conversions
2. Click **New conversion event**
3. Add each event name:
   - `generate_lead`
   - `phone_click`
   - `email_click`
4. Toggle ON to mark as conversion

---

## Part 5: Form Tracking (Detailed Setup)

### For Contact Form 7 (WordPress)

Add this JavaScript to track form submissions:

1. Go to Appearance > Theme File Editor > functions.php
2. Add at the end:

```php
// GA4 Contact Form 7 Tracking
add_action('wp_footer', 'cf7_ga4_tracking');
function cf7_ga4_tracking() {
    ?>
    <script>
    document.addEventListener('wpcf7mailsent', function(event) {
        gtag('event', 'generate_lead', {
            'event_category': 'Contact',
            'event_label': event.detail.contactFormId,
            'form_id': event.detail.contactFormId,
            'form_name': 'Contact Form'
        });
    }, false);
    </script>
    <?php
}
```

### For WPForms

Add this to functions.php:

```php
// GA4 WPForms Tracking
add_action('wpforms_process_complete', 'wpforms_ga4_tracking', 10, 4);
function wpforms_ga4_tracking($fields, $entry, $form_data, $entry_id) {
    ?>
    <script>
    gtag('event', 'generate_lead', {
        'event_category': 'Contact',
        'event_label': '<?php echo esc_js($form_data['settings']['form_title']); ?>',
        'form_id': '<?php echo esc_js($form_data['id']); ?>',
        'form_name': '<?php echo esc_js($form_data['settings']['form_title']); ?>'
    });
    </script>
    <?php
}
```

### For Gravity Forms

Use the Gravity Forms Google Analytics Add-On, or add custom tracking:

```javascript
// Add to theme's custom JS file
jQuery(document).on('gform_confirmation_loaded', function(event, formId){
    gtag('event', 'generate_lead', {
        'event_category': 'Contact',
        'event_label': formId,
        'form_id': formId
    });
});
```

---

## Part 6: CTA Button Click Tracking

### Track All CTA Buttons

Add this JavaScript to your theme (or via plugin):

```javascript
// Track CTA button clicks
document.addEventListener('DOMContentLoaded', function() {
    // Track buttons with specific classes
    var ctaButtons = document.querySelectorAll('.cta-button, .btn-primary, .contact-btn, a[href*="/contact"]');
    
    ctaButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            gtag('event', 'cta_click', {
                'event_category': 'Engagement',
                'event_label': this.innerText || this.href,
                'button_text': this.innerText,
                'button_url': this.href
            });
        });
    });
});
```

### Track Specific Buttons by ID

```javascript
// Track specific CTA
document.getElementById('hero-cta').addEventListener('click', function() {
    gtag('event', 'cta_click', {
        'event_category': 'Engagement',
        'event_label': 'Hero CTA',
        'button_location': 'homepage_hero'
    });
});
```

---

## Part 7: Custom Dimensions for Lead Tracking

### Create Custom Dimensions

1. Go to Admin > Custom Definitions
2. Click **Create custom dimension**

Create these dimensions:

| Name | Scope | Parameter |
|------|-------|-----------|
| Lead Source | Event | lead_source |
| Service Interest | Event | service_interest |
| Form Name | Event | form_name |
| Page Category | Event | page_category |

### Use Custom Dimensions in Events

When tracking form submissions, include custom parameters:

```javascript
gtag('event', 'generate_lead', {
    'event_category': 'Contact',
    'lead_source': 'website',
    'service_interest': 'landscaping-website', // Dynamic based on page
    'form_name': 'Contact Form',
    'page_category': 'services'
});
```

---

## Part 8: Set Up Goals/Conversions

### Key Conversions to Track

1. **Lead Generated** (Primary Goal)
   - Event: `generate_lead`
   - Trigger: Form submission
   - Value: $50 (estimated lead value)

2. **Phone Call Initiated**
   - Event: `phone_click`
   - Trigger: Click on tel: link
   - Value: $30

3. **Email Contact**
   - Event: `email_click`
   - Trigger: Click on mailto: link
   - Value: $20

### Assign Conversion Values (Optional)

1. Go to Admin > Conversions
2. Click on a conversion event
3. Enable "Default conversion value"
4. Set value based on estimated lead worth

---

## Part 9: Set Up Audiences

### Create Key Audiences

1. Go to Admin > Audiences
2. Click **New Audience**

#### Audience 1: Form Submitters
- Name: `Lead - Form Submitted`
- Condition: Event = `generate_lead`
- Membership duration: 90 days

#### Audience 2: Service Page Visitors
- Name: `Interested - Services Viewed`
- Condition: Page path contains `/services/`
- Membership duration: 30 days

#### Audience 3: High Intent Visitors
- Name: `High Intent - Multiple Pages`
- Condition: Session page views > 3
- Membership duration: 14 days

#### Audience 4: Blog Readers
- Name: `Content Engaged - Blog`
- Condition: Page path contains `/blog/`
- Membership duration: 60 days

---

## Part 10: Dashboard & Reports Setup

### Create Custom Explorations

1. Go to Explore > Create new exploration

#### Exploration 1: Lead Funnel
- Technique: Funnel exploration
- Steps:
  1. Session start
  2. Services page view
  3. Contact page view
  4. Form submit

#### Exploration 2: Traffic Sources to Leads
- Technique: Free form
- Rows: Session source/medium
- Values: Sessions, Conversions, Conversion rate

### Link to Google Search Console

1. Go to Admin > Product Links
2. Click **Search Console Links**
3. Click **Link**
4. Select your Search Console property
5. Click **Submit**

This allows you to see search queries in GA4.

---

## Part 11: Verification Checklist

Before going live, verify:

### Basic Setup
- [ ] GA4 property created
- [ ] Measurement ID installed on all pages
- [ ] Real-time reports showing data
- [ ] Enhanced measurement enabled

### Events & Conversions
- [ ] Form submission event firing
- [ ] Phone click event firing
- [ ] Email click event firing
- [ ] CTA click event firing
- [ ] All key events marked as conversions

### Custom Setup
- [ ] Custom dimensions created
- [ ] Key audiences created
- [ ] Search Console linked (after site verification)

### Testing
- [ ] Submit test form, verify event in Real-time
- [ ] Click phone number, verify event
- [ ] Click email, verify event
- [ ] Check Debug mode for errors

---

## Part 12: Debug Mode (Testing)

### Enable Debug Mode

1. Install **Google Analytics Debugger** Chrome extension
2. Or add to GA4 config:

```javascript
gtag('config', 'G-XXXXXXXXXX', {
    'debug_mode': true
});
```

### View Debug Data

1. GA4 > Admin > DebugView
2. Navigate your site
3. Watch events appear in real-time

### Remove Debug Mode for Production

```javascript
gtag('config', 'G-XXXXXXXXXX', {
    'debug_mode': false // Or remove this line entirely
});
```

---

## Quick Reference: GA4 Measurement ID

After setup, your Measurement ID will look like: `G-XXXXXXXXXX`

Store it here after creation:
- **Measurement ID:** ________________
- **Property ID:** ________________
- **Stream ID:** ________________

---

## Ongoing Maintenance

### Weekly
- Check real-time reports for issues
- Review conversion counts

### Monthly
- Review traffic sources report
- Check top landing pages
- Review conversion funnel
- Export lead report

### Quarterly
- Audit events (are they still firing?)
- Review and update audiences
- Check for new GA4 features
- Compare to previous quarter

---

*Last updated: March 2026*
