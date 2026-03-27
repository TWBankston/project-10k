# Meta Tags & Schema Markup for TBDesigned.io

This document contains optimized meta tags, Open Graph tags, Twitter Cards, and Schema.org markup for every page on TBDesigned.io.

---

## Homepage

### Meta Tags
```html
<title>Contractor Website Design | Professional Sites for Home Services | TBDesigned</title>
<meta name="description" content="Get a professional website that brings in leads. We build conversion-focused sites for landscapers, cleaners, HVAC, plumbers & more. Free consultation.">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://tbdesigned.io/">
```

### Open Graph Tags
```html
<meta property="og:title" content="Contractor Website Design | TBDesigned">
<meta property="og:description" content="Professional websites that bring in leads for home service contractors. Landscaping, cleaning, HVAC, plumbing & more.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://tbdesigned.io/">
<meta property="og:image" content="https://tbdesigned.io/images/og-homepage.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="TBDesigned">
<meta property="og:locale" content="en_US">
```

### Twitter Card Tags
```html
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Contractor Website Design | TBDesigned">
<meta name="twitter:description" content="Professional websites that bring in leads for home service contractors.">
<meta name="twitter:image" content="https://tbdesigned.io/images/twitter-homepage.jpg">
<meta name="twitter:site" content="@tbdesigned">
```

### Schema.org Markup (LocalBusiness + WebDesign)
```json
{
  "@context": "https://schema.org",
  "@type": "ProfessionalService",
  "name": "TBDesigned",
  "alternateName": "TBDesigned LLC",
  "description": "Professional website design for home service contractors including landscapers, cleaning companies, HVAC, plumbers, and electricians.",
  "url": "https://tbdesigned.io",
  "logo": "https://tbdesigned.io/images/logo.png",
  "image": "https://tbdesigned.io/images/og-homepage.jpg",
  "telephone": "+1-XXX-XXX-XXXX",
  "email": "hello@tbdesigned.io",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Asheville",
    "addressRegion": "NC",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "35.5951",
    "longitude": "-82.5515"
  },
  "areaServed": [
    {
      "@type": "City",
      "name": "Asheville",
      "containedInPlace": {
        "@type": "State",
        "name": "North Carolina"
      }
    },
    {
      "@type": "Country",
      "name": "United States"
    }
  ],
  "serviceType": ["Website Design", "Web Development", "Digital Marketing"],
  "priceRange": "$$",
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
      "opens": "09:00",
      "closes": "17:00"
    }
  ],
  "sameAs": [
    "https://www.linkedin.com/company/tbdesigned",
    "https://www.facebook.com/tbdesigned",
    "https://www.instagram.com/tbdesigned"
  ]
}
```

---

## Services Page

### Meta Tags
```html
<title>Web Design Services for Contractors | Landscaping, HVAC, Plumbing | TBDesigned</title>
<meta name="description" content="Website design packages for home service businesses. Landscaping, cleaning, HVAC, plumbing, electrical & more. Starting at $1,500. See what's included.">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://tbdesigned.io/services/">
```

### Open Graph Tags
```html
<meta property="og:title" content="Web Design Services for Contractors | TBDesigned">
<meta property="og:description" content="Website packages built for home service businesses. See pricing, features, and what's included.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://tbdesigned.io/services/">
<meta property="og:image" content="https://tbdesigned.io/images/og-services.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="TBDesigned">
```

### Twitter Card Tags
```html
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Web Design Services for Contractors | TBDesigned">
<meta name="twitter:description" content="Website packages built for home service businesses. See pricing and features.">
<meta name="twitter:image" content="https://tbdesigned.io/images/twitter-services.jpg">
```

### Schema.org Service Markup
```json
{
  "@context": "https://schema.org",
  "@type": "Service",
  "serviceType": "Website Design",
  "name": "Contractor Website Design Services",
  "description": "Professional website design and development for home service contractors including landscapers, cleaning companies, HVAC technicians, plumbers, and electricians.",
  "provider": {
    "@type": "ProfessionalService",
    "name": "TBDesigned",
    "url": "https://tbdesigned.io"
  },
  "areaServed": {
    "@type": "Country",
    "name": "United States"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Website Design Packages",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Starter Website Package",
          "description": "5-page professional website with contact form, mobile responsive design, and basic SEO."
        },
        "price": "1500",
        "priceCurrency": "USD"
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Growth Website Package",
          "description": "10-page website with lead capture, portfolio, blog setup, and advanced SEO."
        },
        "price": "3000",
        "priceCurrency": "USD"
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Premium Website Package",
          "description": "Custom website with unlimited pages, e-commerce options, booking integration, and ongoing support."
        },
        "price": "5000",
        "priceCurrency": "USD"
      }
    ]
  }
}
```

---

## About Page

### Meta Tags
```html
<title>About TBDesigned | Web Designer for Home Service Contractors</title>
<meta name="description" content="Meet Tyler Bankston, founder of TBDesigned. Based in Asheville, NC, helping home service contractors get professional websites that generate leads.">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://tbdesigned.io/about/">
```

### Open Graph Tags
```html
<meta property="og:title" content="About TBDesigned | Meet the Team">
<meta property="og:description" content="Meet Tyler Bankston, founder of TBDesigned. Based in Asheville, NC, helping contractors get professional websites.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://tbdesigned.io/about/">
<meta property="og:image" content="https://tbdesigned.io/images/og-about.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="TBDesigned">
```

### Twitter Card Tags
```html
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="About TBDesigned | Meet the Team">
<meta name="twitter:description" content="Meet Tyler Bankston, founder of TBDesigned. Helping contractors get websites that work.">
<meta name="twitter:image" content="https://tbdesigned.io/images/twitter-about.jpg">
```

### Schema.org Person Markup
```json
{
  "@context": "https://schema.org",
  "@type": "Person",
  "name": "Tyler Bankston",
  "jobTitle": "Founder & Web Designer",
  "worksFor": {
    "@type": "Organization",
    "name": "TBDesigned",
    "url": "https://tbdesigned.io"
  },
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Asheville",
    "addressRegion": "NC",
    "addressCountry": "US"
  },
  "knowsAbout": ["Web Design", "WordPress Development", "Digital Marketing", "SEO"],
  "sameAs": [
    "https://www.linkedin.com/in/tylerbankston",
    "https://www.instagram.com/tyler_"
  ]
}
```

---

## Contact Page

### Meta Tags
```html
<title>Contact TBDesigned | Get a Free Website Consultation</title>
<meta name="description" content="Ready to get a professional website for your home service business? Contact TBDesigned for a free consultation. Call or fill out our form.">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://tbdesigned.io/contact/">
```

### Open Graph Tags
```html
<meta property="og:title" content="Contact TBDesigned | Free Consultation">
<meta property="og:description" content="Get a free website consultation for your home service business. Let's discuss your project.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://tbdesigned.io/contact/">
<meta property="og:image" content="https://tbdesigned.io/images/og-contact.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="TBDesigned">
```

### Twitter Card Tags
```html
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Contact TBDesigned | Free Consultation">
<meta name="twitter:description" content="Get a free website consultation for your home service business.">
<meta name="twitter:image" content="https://tbdesigned.io/images/twitter-contact.jpg">
```

### Schema.org ContactPage Markup
```json
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "Contact TBDesigned",
  "description": "Contact page for TBDesigned web design services",
  "url": "https://tbdesigned.io/contact/",
  "mainEntity": {
    "@type": "ProfessionalService",
    "name": "TBDesigned",
    "telephone": "+1-XXX-XXX-XXXX",
    "email": "hello@tbdesigned.io",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Asheville",
      "addressRegion": "NC",
      "addressCountry": "US"
    }
  }
}
```

---

## Blog (Main Archive Page)

### Meta Tags
```html
<title>Web Design Tips for Contractors | TBDesigned Blog</title>
<meta name="description" content="Tips, guides, and insights for home service contractors looking to improve their online presence. Website design, SEO, and marketing advice.">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://tbdesigned.io/blog/">
```

### Open Graph Tags
```html
<meta property="og:title" content="Web Design Tips for Contractors | TBDesigned Blog">
<meta property="og:description" content="Tips, guides, and insights for home service contractors looking to improve their online presence.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://tbdesigned.io/blog/">
<meta property="og:image" content="https://tbdesigned.io/images/og-blog.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="TBDesigned">
```

### Twitter Card Tags
```html
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Web Design Tips for Contractors | TBDesigned Blog">
<meta name="twitter:description" content="Tips and guides for home service contractors looking to improve their online presence.">
<meta name="twitter:image" content="https://tbdesigned.io/images/twitter-blog.jpg">
```

### Schema.org Blog Markup
```json
{
  "@context": "https://schema.org",
  "@type": "Blog",
  "name": "TBDesigned Blog",
  "description": "Tips, guides, and insights for home service contractors on website design, SEO, and digital marketing.",
  "url": "https://tbdesigned.io/blog/",
  "publisher": {
    "@type": "Organization",
    "name": "TBDesigned",
    "logo": {
      "@type": "ImageObject",
      "url": "https://tbdesigned.io/images/logo.png"
    }
  }
}
```

---

## Blog Post Template

### Meta Tags
```html
<title>[Post Title] | TBDesigned Blog</title>
<meta name="description" content="[First 155 characters of post summary]">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://tbdesigned.io/blog/[post-slug]/">
<meta name="author" content="Tyler Bankston">
```

### Open Graph Tags
```html
<meta property="og:title" content="[Post Title]">
<meta property="og:description" content="[Post summary - 2-3 sentences]">
<meta property="og:type" content="article">
<meta property="og:url" content="https://tbdesigned.io/blog/[post-slug]/">
<meta property="og:image" content="https://tbdesigned.io/images/blog/[post-slug]-og.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="TBDesigned">
<meta property="article:published_time" content="[ISO 8601 date]">
<meta property="article:modified_time" content="[ISO 8601 date]">
<meta property="article:author" content="https://tbdesigned.io/about/">
<meta property="article:section" content="[Category]">
<meta property="article:tag" content="[Tag 1]">
<meta property="article:tag" content="[Tag 2]">
```

### Twitter Card Tags
```html
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="[Post Title]">
<meta name="twitter:description" content="[Post summary]">
<meta name="twitter:image" content="https://tbdesigned.io/images/blog/[post-slug]-twitter.jpg">
<meta name="twitter:creator" content="@tylerbankston">
```

### Schema.org Article Markup
```json
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "[Post Title]",
  "description": "[Post summary]",
  "image": "https://tbdesigned.io/images/blog/[post-slug]-og.jpg",
  "datePublished": "[ISO 8601 date]",
  "dateModified": "[ISO 8601 date]",
  "author": {
    "@type": "Person",
    "name": "Tyler Bankston",
    "url": "https://tbdesigned.io/about/"
  },
  "publisher": {
    "@type": "Organization",
    "name": "TBDesigned",
    "logo": {
      "@type": "ImageObject",
      "url": "https://tbdesigned.io/images/logo.png"
    }
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://tbdesigned.io/blog/[post-slug]/"
  }
}
```

---

## Industry Service Page Template (e.g., Landscaping Websites)

### Meta Tags Example: Landscaping
```html
<title>Landscaping Website Design | Sites That Get Leads | TBDesigned</title>
<meta name="description" content="Professional websites for landscaping companies. Showcase your work, capture leads, and grow your business. See examples and pricing.">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://tbdesigned.io/services/landscaping-websites/">
```

### Open Graph Tags
```html
<meta property="og:title" content="Landscaping Website Design | TBDesigned">
<meta property="og:description" content="Professional websites for landscaping companies. Showcase your work and capture leads.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://tbdesigned.io/services/landscaping-websites/">
<meta property="og:image" content="https://tbdesigned.io/images/og-landscaping.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="TBDesigned">
```

### Schema.org Service + FAQ Markup
```json
{
  "@context": "https://schema.org",
  "@type": "Service",
  "serviceType": "Landscaping Website Design",
  "name": "Website Design for Landscaping Companies",
  "description": "Professional website design and development for landscaping and lawn care businesses. Features include portfolio galleries, service pages, lead capture forms, and SEO optimization.",
  "provider": {
    "@type": "ProfessionalService",
    "name": "TBDesigned",
    "url": "https://tbdesigned.io"
  },
  "areaServed": {
    "@type": "Country",
    "name": "United States"
  }
}
```

### FAQ Schema (Add to service pages)
```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How much does a landscaping website cost?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our landscaping website packages start at $1,500 for a 5-page professional site. Growth packages with more features and pages start at $3,000. We also offer custom solutions for larger companies."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to build a landscaping website?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Most landscaping websites take 2-4 weeks from start to launch. This includes design, development, content creation, and revisions. Rush delivery is available for an additional fee."
      }
    },
    {
      "@type": "Question",
      "name": "Do you provide hosting for landscaping websites?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we offer managed WordPress hosting starting at $50/month. This includes security updates, daily backups, SSL certificate, and basic support. We can also deploy to your existing hosting."
      }
    },
    {
      "@type": "Question",
      "name": "Will my landscaping website work on mobile?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely. All our websites are mobile-responsive and optimized for all devices. We test on phones, tablets, and desktops to ensure a great experience everywhere."
      }
    }
  ]
}
```

---

## Implementation in WordPress

### Using Rank Math SEO Plugin

1. **Install Rank Math SEO** (free version works)
2. **General Settings > Edit Schema:**
   - Set organization type to "Professional Service"
   - Add logo, social profiles
3. **For each page:**
   - Edit page > Rank Math tab
   - Add focus keyword
   - Edit snippet (title, description)
   - Add schema type (select from dropdown or use custom JSON)

### Adding Custom Schema
If Rank Math doesn't have the exact schema type:

1. Install **Code Snippets** plugin
2. Add schema to `<head>` via snippet:

```php
add_action('wp_head', function() {
    if (is_page('services')) { // Change page slug as needed
        ?>
        <script type="application/ld+json">
        // Paste JSON-LD here
        </script>
        <?php
    }
});
```

Or use Rank Math's "Custom Schema" feature (Pro version).

---

## Image Requirements

### OG Images (Open Graph)
- **Size:** 1200 x 630 pixels
- **Format:** JPG or PNG
- **File name:** `og-[page-name].jpg`
- **Location:** `/images/` folder
- **Content:** Include logo, relevant imagery, brief text

### Twitter Images
- **Size:** 1200 x 600 pixels (or same as OG)
- **Format:** JPG or PNG
- **File name:** `twitter-[page-name].jpg`

### Checklist for Each Page
- [ ] OG image created and uploaded
- [ ] Twitter image created and uploaded
- [ ] Logo file at `/images/logo.png` (square, 500x500+)
- [ ] Schema logo referenced correctly

---

## Testing Tools

Before launch, test all markup:

1. **Google Rich Results Test:** https://search.google.com/test/rich-results
2. **Facebook Sharing Debugger:** https://developers.facebook.com/tools/debug/
3. **Twitter Card Validator:** https://cards-dev.twitter.com/validator
4. **Schema Markup Validator:** https://validator.schema.org/

---

*Last updated: March 2026*
