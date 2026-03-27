# Google Tag Manager Setup Guide for TBDesigned.io

Complete guide to implement Google Tag Manager for centralized tracking management.

---

## Why Use GTM?

- **Centralized tracking:** Manage all tags (GA4, Facebook, Google Ads) in one place
- **No code changes needed:** Add/edit tracking without touching WordPress
- **Version control:** Roll back changes if something breaks
- **Easy testing:** Preview mode before publishing
- **Better performance:** Asynchronous loading

---

## Part 1: Create GTM Account & Container

### Step 1: Access Google Tag Manager
1. Go to https://tagmanager.google.com
2. Sign in with Google account (same as GA4: ash.tbdesigned.io@gmail.com)

### Step 2: Create Account
1. Click **Create Account**
2. Account name: `TBDesigned`
3. Country: `United States`

### Step 3: Create Container
1. Container name: `tbdesigned.io`
2. Target platform: **Web**
3. Click **Create**
4. Accept Terms of Service

### Step 4: Get Container Code
After creation, you'll see two code snippets:

**Code 1 (Head):** Paste immediately after `<head>`
```html
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-XXXXXXX');</script>
<!-- End Google Tag Manager -->
```

**Code 2 (Body):** Paste immediately after `<body>`
```html
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXXXX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
```

**Save your Container ID:** `GTM-XXXXXXX` (replace with actual)

---

## Part 2: Install GTM on WordPress

### Option A: Using a Plugin (Recommended)

1. **Install GTM4WP Plugin:**
   - WordPress Admin > Plugins > Add New
   - Search "GTM4WP"
   - Install and Activate

2. **Configure Plugin:**
   - Go to Settings > Google Tag Manager
   - Enter Container ID: `GTM-XXXXXXX`
   - Container code placement: **Footer of the page** (recommended for speed)
   - Or select **Custom** and use header.php
   - Click **Save Changes**

### Option B: Manual Installation (Theme Files)

1. **Edit header.php:**
   - Appearance > Theme File Editor > header.php
   - Add Code 1 immediately after `<head>` tag

2. **Add noscript code:**
   - Add Code 2 immediately after `<body>` tag

3. **For child themes:**
   - Copy header.php to child theme first
   - Then edit

### Option C: Using Insert Headers and Footers Plugin

1. Install "Insert Headers and Footers" plugin
2. Go to Settings > Insert Headers and Footers
3. Paste Code 1 in **Scripts in Header**
4. Paste Code 2 in **Scripts in Body**
5. Save

---

## Part 3: Configure Built-in Variables

### Enable Required Variables

1. In GTM, go to **Variables**
2. Click **Configure** (built-in variables)
3. Enable these:

**Pages:**
- ✅ Page URL
- ✅ Page Hostname
- ✅ Page Path
- ✅ Referrer

**Utilities:**
- ✅ Event
- ✅ Container ID
- ✅ Container Version
- ✅ Debug Mode

**Clicks:**
- ✅ Click Element
- ✅ Click Classes
- ✅ Click ID
- ✅ Click Target
- ✅ Click URL
- ✅ Click Text

**Forms:**
- ✅ Form Element
- ✅ Form Classes
- ✅ Form ID
- ✅ Form Target
- ✅ Form URL
- ✅ Form Text

**Scrolling:**
- ✅ Scroll Depth Threshold
- ✅ Scroll Depth Units
- ✅ Scroll Direction

**Videos:**
- ✅ Video Provider
- ✅ Video Status
- ✅ Video URL
- ✅ Video Title
- ✅ Video Duration
- ✅ Video Current Time
- ✅ Video Percent
- ✅ Video Visible

---

## Part 4: Create User-Defined Variables

### Variable 1: GA4 Measurement ID

1. Click **Variables** > **New**
2. Name: `GA4 - Measurement ID`
3. Type: **Constant**
4. Value: `G-XXXXXXXXXX` (your GA4 ID)
5. Save

### Variable 2: Click URL Contains Tel

1. **New Variable**
2. Name: `Click URL Contains Tel`
3. Type: **Regex Table**
4. Input Variable: `{{Click URL}}`
5. Pattern: `^tel:` → Output: `true`
6. Default: `false`
7. Save

### Variable 3: Click URL Contains Mailto

1. **New Variable**
2. Name: `Click URL Contains Mailto`
3. Type: **Regex Table**
4. Input Variable: `{{Click URL}}`
5. Pattern: `^mailto:` → Output: `true`
6. Default: `false`
7. Save

### Variable 4: dataLayer - Form Name

1. **New Variable**
2. Name: `DL - Form Name`
3. Type: **Data Layer Variable**
4. Data Layer Variable Name: `formName`
5. Save

---

## Part 5: Create Triggers

### Trigger 1: All Pages

1. Click **Triggers** > **New**
2. Name: `All Pages`
3. Type: **Page View**
4. Fire on: **All Page Views**
5. Save

### Trigger 2: Contact Form Submission

1. **New Trigger**
2. Name: `Form - Contact Submit`
3. Type: **Form Submission**
4. Enable: Check all options
5. Fire on: **Some Forms**
6. Conditions:
   - Form ID contains `contact` OR
   - Form Classes contains `wpcf7` (Contact Form 7) OR
   - Form Classes contains `wpforms` (WPForms)
7. Save

### Trigger 3: Phone Number Click

1. **New Trigger**
2. Name: `Click - Phone Number`
3. Type: **Click - Just Links**
4. Enable: ✅ Wait for Tags, ✅ Check Validation
5. Fire on: **Some Link Clicks**
6. Conditions:
   - Click URL starts with `tel:`
7. Save

### Trigger 4: Email Link Click

1. **New Trigger**
2. Name: `Click - Email Link`
3. Type: **Click - Just Links**
4. Enable: ✅ Wait for Tags
5. Fire on: **Some Link Clicks**
6. Conditions:
   - Click URL starts with `mailto:`
7. Save

### Trigger 5: CTA Button Click

1. **New Trigger**
2. Name: `Click - CTA Button`
3. Type: **Click - All Elements**
4. Fire on: **Some Clicks**
5. Conditions (any of these):
   - Click Classes contains `cta`
   - Click Classes contains `btn-primary`
   - Click Classes contains `contact-btn`
   - Click URL contains `/contact`
7. Save

### Trigger 6: Scroll Depth 90%

1. **New Trigger**
2. Name: `Scroll - 90 Percent`
3. Type: **Scroll Depth**
4. Scroll Depth Type: **Vertical Scroll Depths**
5. Percentages: `90`
6. Fire on: **All Pages**
7. Save

### Trigger 7: Services Page View

1. **New Trigger**
2. Name: `Page View - Services`
3. Type: **Page View**
4. Fire on: **Some Page Views**
5. Conditions:
   - Page Path contains `/services`
7. Save

### Trigger 8: YouTube Video Start

1. **New Trigger**
2. Name: `Video - YouTube Start`
3. Type: **YouTube Video**
4. Capture: **Start**
5. Fire on: **All Videos**
6. Save

---

## Part 6: Create Tags

### Tag 1: GA4 Configuration

1. Click **Tags** > **New**
2. Name: `GA4 - Configuration`
3. Tag Type: **Google Analytics: GA4 Configuration**
4. Measurement ID: `{{GA4 - Measurement ID}}`
5. Triggering: **All Pages**
6. Save

### Tag 2: GA4 - Form Submission Event

1. **New Tag**
2. Name: `GA4 - Event - Form Submit`
3. Tag Type: **Google Analytics: GA4 Event**
4. Configuration Tag: Select `GA4 - Configuration`
5. Event Name: `generate_lead`
6. Event Parameters:
   - `event_category` = `Contact`
   - `form_name` = `{{Form Classes}}`
   - `page_path` = `{{Page Path}}`
7. Triggering: **Form - Contact Submit**
8. Save

### Tag 3: GA4 - Phone Click Event

1. **New Tag**
2. Name: `GA4 - Event - Phone Click`
3. Tag Type: **Google Analytics: GA4 Event**
4. Configuration Tag: Select `GA4 - Configuration`
5. Event Name: `phone_click`
6. Event Parameters:
   - `event_category` = `Contact`
   - `click_url` = `{{Click URL}}`
   - `page_path` = `{{Page Path}}`
7. Triggering: **Click - Phone Number**
8. Save

### Tag 4: GA4 - Email Click Event

1. **New Tag**
2. Name: `GA4 - Event - Email Click`
3. Tag Type: **Google Analytics: GA4 Event**
4. Configuration Tag: Select `GA4 - Configuration`
5. Event Name: `email_click`
6. Event Parameters:
   - `event_category` = `Contact`
   - `click_url` = `{{Click URL}}`
   - `page_path` = `{{Page Path}}`
7. Triggering: **Click - Email Link**
8. Save

### Tag 5: GA4 - CTA Click Event

1. **New Tag**
2. Name: `GA4 - Event - CTA Click`
3. Tag Type: **Google Analytics: GA4 Event**
4. Configuration Tag: Select `GA4 - Configuration`
5. Event Name: `cta_click`
6. Event Parameters:
   - `event_category` = `Engagement`
   - `button_text` = `{{Click Text}}`
   - `button_classes` = `{{Click Classes}}`
   - `page_path` = `{{Page Path}}`
7. Triggering: **Click - CTA Button**
8. Save

### Tag 6: GA4 - Scroll 90%

1. **New Tag**
2. Name: `GA4 - Event - Scroll 90`
3. Tag Type: **Google Analytics: GA4 Event**
4. Configuration Tag: Select `GA4 - Configuration`
5. Event Name: `scroll_90`
6. Event Parameters:
   - `event_category` = `Engagement`
   - `page_path` = `{{Page Path}}`
7. Triggering: **Scroll - 90 Percent**
8. Save

---

## Part 7: Google Ads Conversion Tracking (For Later)

### When You Set Up Google Ads:

### Tag: Google Ads Conversion

1. **New Tag**
2. Name: `Google Ads - Conversion - Lead`
3. Tag Type: **Google Ads Conversion Tracking**
4. Conversion ID: `AW-XXXXXXXXX` (from Google Ads)
5. Conversion Label: `XXXXXXXXXX` (from Google Ads)
6. Triggering: **Form - Contact Submit**
7. Save

### Tag: Google Ads Remarketing

1. **New Tag**
2. Name: `Google Ads - Remarketing`
3. Tag Type: **Google Ads Remarketing**
4. Conversion ID: `AW-XXXXXXXXX`
5. Triggering: **All Pages**
6. Save

---

## Part 8: Facebook Pixel (Optional, For Later)

### Tag: Facebook Base Pixel

1. **New Tag**
2. Name: `Facebook - Base Pixel`
3. Tag Type: **Custom HTML**
4. HTML:
```html
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', 'YOUR_PIXEL_ID');
fbq('track', 'PageView');
</script>
```
5. Triggering: **All Pages**
6. Save

### Tag: Facebook Lead Event

1. **New Tag**
2. Name: `Facebook - Lead Event`
3. Tag Type: **Custom HTML**
4. HTML:
```html
<script>
fbq('track', 'Lead');
</script>
```
5. Triggering: **Form - Contact Submit**
6. Save

---

## Part 9: Test & Debug

### Preview Mode

1. In GTM, click **Preview** button (top right)
2. Enter your website URL: `https://tbdesigned.io`
3. Click **Connect**
4. A new tab opens with your site + debug panel

### What to Test

1. **Page Load:**
   - GA4 Configuration tag should fire
   - Check "Tags Fired" section

2. **Form Submission:**
   - Submit test form
   - GA4 Form Submit tag should fire
   - Check event parameters are correct

3. **Click Events:**
   - Click phone number
   - Click email
   - Click CTA buttons
   - Verify each tag fires

4. **Scroll:**
   - Scroll to bottom of page
   - Scroll 90% tag should fire

### Common Issues

| Problem | Solution |
|---------|----------|
| Tag not firing | Check trigger conditions |
| Wrong data | Check variable configuration |
| Form submit not tracked | May need custom data layer push |
| Preview not connecting | Clear cookies, disable ad blockers |

### Debug in GA4

1. Keep GTM Preview open
2. Go to GA4 > Admin > DebugView
3. Watch events come in real-time
4. Verify event names and parameters

---

## Part 10: Publish Container

### Before Publishing

1. Test ALL tags in Preview mode
2. Verify data in GA4 DebugView
3. Check for JavaScript errors in console

### Publish

1. Click **Submit** (top right)
2. Version Name: `v1.0 - Initial Setup`
3. Version Description:
```
Initial GTM setup including:
- GA4 configuration
- Form submission tracking
- Phone click tracking
- Email click tracking
- CTA click tracking
- Scroll depth tracking
```
4. Click **Publish**

### After Publishing

1. Wait 5-10 minutes for propagation
2. Visit site normally (not preview mode)
3. Check GA4 Real-time reports
4. Verify events are coming through

---

## Part 11: Data Layer Reference

For advanced tracking, push data to the data layer:

### WordPress Form Submission

Add to theme's functions.php:

```php
// Push form data to GTM dataLayer
add_action('wp_footer', 'gtm_form_tracking');
function gtm_form_tracking() {
    ?>
    <script>
    // Contact Form 7
    document.addEventListener('wpcf7mailsent', function(event) {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event': 'formSubmit',
            'formName': 'Contact Form 7',
            'formId': event.detail.contactFormId
        });
    }, false);
    
    // WPForms
    jQuery(document).on('wpformsAjaxSubmitSuccess', function(event, response) {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event': 'formSubmit',
            'formName': 'WPForms',
            'formId': response.data.form_id
        });
    });
    </script>
    <?php
}
```

### Using Data Layer in GTM

Create trigger for custom events:

1. **New Trigger**
2. Name: `Custom Event - Form Submit`
3. Type: **Custom Event**
4. Event Name: `formSubmit`
5. Fire on: **All Custom Events**

---

## Part 12: GTM Container Summary

### Variables Created
| Name | Type | Purpose |
|------|------|---------|
| GA4 - Measurement ID | Constant | GA4 ID storage |
| Click URL Contains Tel | Regex | Phone click detection |
| Click URL Contains Mailto | Regex | Email click detection |
| DL - Form Name | Data Layer | Form name extraction |

### Triggers Created
| Name | Type | Fires On |
|------|------|----------|
| All Pages | Page View | Every page |
| Form - Contact Submit | Form Submission | Contact forms |
| Click - Phone Number | Link Click | tel: links |
| Click - Email Link | Link Click | mailto: links |
| Click - CTA Button | All Clicks | CTA elements |
| Scroll - 90 Percent | Scroll Depth | 90% scroll |
| Page View - Services | Page View | /services/ pages |

### Tags Created
| Name | Type | Trigger |
|------|------|---------|
| GA4 - Configuration | GA4 Config | All Pages |
| GA4 - Event - Form Submit | GA4 Event | Form - Contact Submit |
| GA4 - Event - Phone Click | GA4 Event | Click - Phone Number |
| GA4 - Event - Email Click | GA4 Event | Click - Email Link |
| GA4 - Event - CTA Click | GA4 Event | Click - CTA Button |
| GA4 - Event - Scroll 90 | GA4 Event | Scroll - 90 Percent |

---

## Quick Reference

**Container ID:** GTM-XXXXXXX (fill in after creation)
**GA4 Measurement ID:** G-XXXXXXXXXX (fill in after creation)

---

## Maintenance

### Weekly
- Check real-time reports for tracking issues
- Review Tag Assistant for errors

### Monthly
- Review tag performance
- Check for unused tags
- Update triggers if site structure changes

### When Adding Features
- New form? Add to form submission trigger
- New CTA? Add to CTA click trigger
- New page type? Consider new triggers

---

*Last updated: March 2026*
