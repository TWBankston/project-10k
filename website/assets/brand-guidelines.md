# TBDesigned Brand Guidelines

## Brand Overview

**Company:** TBDesigned LLC  
**Tagline:** Professional Websites for Home Service Businesses  
**Mission:** Every home service professional deserves a website that works as hard as they do.

---

## Logo

### Primary Logo
- TBDesigned wordmark
- Used on light backgrounds
- Minimum size: 120px wide

### Logo Variations
- Full color (primary)
- Single color (blue)
- Reversed (white on dark)
- Icon only (for favicon/small uses)

### Logo Clear Space
- Maintain clear space equal to the height of the "T" on all sides
- No other elements should encroach on this space

### Logo Don'ts
- Don't stretch or distort
- Don't change colors outside approved palette
- Don't add effects (shadows, gradients)
- Don't place on busy backgrounds
- Don't rotate

---

## Color Palette

### Primary Colors

**Deep Blue (Primary)**
- Hex: #1E3A5F
- RGB: 30, 58, 95
- Use: Headers, primary text, primary buttons

**Teal Green (Secondary)**
- Hex: #2DD4BF
- RGB: 45, 212, 191
- Use: Accents, success states, highlights

**Orange (Accent/CTA)**
- Hex: #F97316
- RGB: 249, 115, 22
- Use: Call-to-action buttons, emphasis

### Neutral Colors

**Charcoal (Dark)**
- Hex: #1F2937
- RGB: 31, 41, 55
- Use: Body text, dark backgrounds

**Gray (Text Secondary)**
- Hex: #6B7280
- RGB: 107, 114, 128
- Use: Secondary text, captions

**Light Gray (Borders)**
- Hex: #E5E7EB
- RGB: 229, 231, 235
- Use: Borders, dividers

**Off-White (Background)**
- Hex: #F9FAFB
- RGB: 249, 250, 251
- Use: Page backgrounds

**White**
- Hex: #FFFFFF
- RGB: 255, 255, 255
- Use: Cards, content areas

### Status Colors

**Success Green**
- Hex: #22C55E
- Use: Success messages, completed states

**Warning Yellow**
- Hex: #EAB308
- Use: Warning messages, attention

**Error Red**
- Hex: #EF4444
- Use: Error messages, urgent

---

## Typography

### Primary Font: Inter

**Why Inter:**
- Clean, modern, highly readable
- Excellent for web
- Free via Google Fonts
- Great at all sizes

**Font Weights:**
- Regular (400) - Body text
- Medium (500) - Emphasis
- Semi-bold (600) - Subheadings
- Bold (700) - Headlines

### Type Scale

```
Hero/H1:     48px / 700 / 1.1 line-height
H2:          36px / 700 / 1.2 line-height
H3:          28px / 600 / 1.3 line-height
H4:          22px / 600 / 1.4 line-height
H5:          18px / 600 / 1.4 line-height
Body Large:  18px / 400 / 1.6 line-height
Body:        16px / 400 / 1.6 line-height
Body Small:  14px / 400 / 1.5 line-height
Caption:     12px / 400 / 1.5 line-height
```

### Mobile Type Scale
```
Hero/H1:     32px
H2:          28px
H3:          24px
H4:          20px
H5:          18px
Body:        16px (unchanged)
```

### Typography Guidelines
- Left-align body text (not justified)
- Limit line length to 65-75 characters
- Use sentence case for headings
- Maintain consistent vertical rhythm

---

## Iconography

### Style
- Simple, outline style
- 2px stroke weight
- Rounded corners
- Consistent sizing

### Recommended Icon Libraries
- Heroicons (preferred)
- Phosphor Icons
- Feather Icons

### Icon Sizes
- Small: 16px (inline)
- Medium: 24px (navigation, lists)
- Large: 48px (feature cards)
- Extra Large: 64px (hero sections)

---

## Photography

### Style Guidelines
- Authentic, real-world images
- Home service professionals at work
- Happy homeowners/customers
- Clean, modern homes
- Natural lighting preferred

### Subjects
- Landscapers tending lawns
- Cleaners in homes
- Pressure washing in action
- Before/after transformations
- Service trucks/vans
- Professional equipment

### Technical Requirements
- High resolution (2000px+ width)
- Good exposure and color
- Minimal heavy editing
- No obvious stock photo feel

### Avoid
- Overly posed/fake looking
- Poor lighting
- Distracting backgrounds
- Dated style/clothing
- Text overlays baked in

### Stock Photo Resources
- Unsplash
- Pexels
- iStock
- Adobe Stock
- Industry-specific photo services

---

## UI Components

### Buttons

**Primary Button**
```css
background: #F97316;
color: white;
padding: 16px 32px;
border-radius: 8px;
font-weight: 600;
font-size: 16px;
```

**Secondary Button**
```css
background: transparent;
color: #1E3A5F;
border: 2px solid #1E3A5F;
padding: 14px 30px;
border-radius: 8px;
font-weight: 600;
```

**Ghost Button**
```css
background: transparent;
color: #1E3A5F;
border: none;
padding: 16px 32px;
font-weight: 600;
text-decoration: underline;
```

### Cards

```css
background: white;
border-radius: 12px;
box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
padding: 24px;
```

### Form Inputs

```css
background: white;
border: 1px solid #E5E7EB;
border-radius: 8px;
padding: 12px 16px;
font-size: 16px;
```

Focus state:
```css
border-color: #2DD4BF;
box-shadow: 0 0 0 3px rgba(45, 212, 191, 0.1);
```

### Links

```css
color: #1E3A5F;
text-decoration: none;
```

Hover:
```css
color: #F97316;
text-decoration: underline;
```

---

## Spacing

### Base Unit: 8px

```
4px   - xs (tight spacing)
8px   - sm
16px  - md (default)
24px  - lg
32px  - xl
48px  - 2xl
64px  - 3xl
96px  - 4xl (section padding)
```

### Section Padding
- Desktop: 96px vertical, 64px horizontal
- Tablet: 64px vertical, 32px horizontal
- Mobile: 48px vertical, 24px horizontal

---

## Layout

### Container
- Max width: 1280px
- Center aligned
- Side padding: 24px (mobile) / 64px (desktop)

### Grid
- 12-column grid
- 24px gutter
- Responsive breakpoints:
  - Mobile: < 768px
  - Tablet: 768px - 1024px
  - Desktop: > 1024px

---

## Voice & Tone

### Brand Voice
- **Professional but approachable** - Not stuffy corporate
- **Direct and clear** - No jargon or fluff
- **Confident** - We know what we're doing
- **Helpful** - Genuinely want clients to succeed
- **Honest** - No overpromising

### Writing Guidelines

**Do:**
- Use "we" and "you"
- Keep sentences short
- Use active voice
- Be specific with benefits
- Sound human

**Don't:**
- Use industry jargon
- Be overly formal
- Use passive voice
- Make vague promises
- Sound robotic

### Headline Style
- Benefit-focused
- Clear value proposition
- 5-10 words ideal
- Sentence case

**Good:** "Your Website Should Book Jobs, Not Just Look Pretty"
**Bad:** "Premium Web Design Solutions for Service Businesses"

### Body Copy Style
- Conversational but professional
- Short paragraphs (2-3 sentences)
- Use bullet points for lists
- Bold key phrases for scanning

---

## Application Examples

### Email Signature
```
Tyler Bankston
Founder, TBDesigned

📧 hello@tbdesigned.io
📞 (828) 555-XXXX
🌐 tbdesigned.io
```

### Social Media Bio
```
Professional websites for home service businesses 🌿🧹
Built to book more jobs | Launch in 2 weeks
Based in Asheville, NC 📍
```

### Client Proposal Header
```
[Logo]

TBDesigned
Professional Websites for Home Service Businesses
hello@tbdesigned.io | (828) 555-XXXX | tbdesigned.io
```

---

## File Naming Conventions

### Images
```
tbdesigned-logo-primary.svg
tbdesigned-logo-reversed.svg
tbdesigned-favicon.png
hero-landscaping-home.jpg
portfolio-[client-name]-desktop.png
team-tyler-headshot.jpg
```

### Documents
```
tbdesigned-proposal-[client]-[date].pdf
tbdesigned-invoice-[number].pdf
tbdesigned-contract-[client].pdf
```

---

## Brand Assets Checklist

### Required
- [ ] Primary logo (SVG + PNG)
- [ ] Reversed logo (SVG + PNG)
- [ ] Favicon (multiple sizes)
- [ ] Open Graph image (1200x630)
- [ ] Email header image
- [ ] Social profile images

### Nice to Have
- [ ] Branded presentation template
- [ ] Proposal template
- [ ] Email signature template
- [ ] Social media post templates
- [ ] Business card design
