# Client Portal Wireframes

## Overview

These wireframes describe the visual layout and structure for each client portal page. They are designed for implementation in WordPress + Elementor.

---

## 1. Login Page

```
┌─────────────────────────────────────────────────────────┐
│                                                         │
│                    [TBDesigned Logo]                    │
│                                                         │
│              ┌─────────────────────────┐                │
│              │   Client Portal Login   │                │
│              └─────────────────────────┘                │
│                                                         │
│    ┌───────────────────────────────────────────────┐    │
│    │ Email                                         │    │
│    │ _____________________________________________ │    │
│    │                                               │    │
│    │ Password                                      │    │
│    │ _____________________________________________ │    │
│    │                                               │    │
│    │              [      Log In      ]             │    │
│    │                                               │    │
│    │         Forgot your password? Reset it        │    │
│    └───────────────────────────────────────────────┘    │
│                                                         │
│             Need help? hello@tbdesigned.io              │
│                                                         │
└─────────────────────────────────────────────────────────┘
```

**Notes:**
- Centered card layout
- Brand colors (deep blue background option)
- Simple, clean form
- Error states for invalid credentials

---

## 2. Dashboard Home

```
┌─────────────────────────────────────────────────────────────────┐
│  [Logo]  Dashboard  Project  Files  Review  Support    [Logout] │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  Welcome back, [Client Name]!                                   │
│  [Company Name] · Joined [Date]                                 │
│                                                                 │
├──────────────────────────────┬──────────────────────────────────┤
│                              │                                  │
│  PROJECT STATUS              │  ACTION ITEMS                    │
│  ┌────────────────────────┐  │  ┌────────────────────────────┐  │
│  │                        │  │  │ ⚠️ Review homepage design  │  │
│  │   ████████░░░░ 60%     │  │  │    [View & Approve →]      │  │
│  │                        │  │  │                            │  │
│  │   Phase: Development   │  │  │ 📄 Upload company photos   │  │
│  │   Target: Apr 15, 2026 │  │  │    [Upload Files →]        │  │
│  │                        │  │  │                            │  │
│  │   [View Full Timeline] │  │  │ ✅ No overdue items        │  │
│  └────────────────────────┘  │  └────────────────────────────┘  │
│                              │                                  │
├──────────────────────────────┴──────────────────────────────────┤
│                                                                 │
│  RECENT ACTIVITY                                                │
│  ┌────────────────────────────────────────────────────────────┐ │
│  │ Mar 21 · New deliverable ready: "Homepage Design v2"       │ │
│  │ Mar 19 · You uploaded: "company-logo.png"                  │ │
│  │ Mar 18 · Milestone complete: Discovery Phase               │ │
│  │ Mar 15 · Project kickoff - Welcome to TBDesigned!          │ │
│  │                                              [View All →]  │ │
│  └────────────────────────────────────────────────────────────┘ │
│                                                                 │
├───────────────┬───────────────┬───────────────┬─────────────────┤
│               │               │               │                 │
│  📁 FILES     │  ✅ REVIEWS   │  🎫 SUPPORT   │  🔑 CREDENTIALS │
│  Upload docs  │  Pending: 1   │  Open: 0      │  After launch   │
│  [Go →]       │  [Go →]       │  [Go →]       │  [Locked]       │
│               │               │               │                 │
└───────────────┴───────────────┴───────────────┴─────────────────┘
```

**Notes:**
- Horizontal navigation at top
- Welcome section with personalization
- Two-column layout for status + actions
- Activity feed below
- Quick link cards at bottom
- Credentials card locked until post-launch

---

## 3. Project Timeline

```
┌─────────────────────────────────────────────────────────────────┐
│  [Logo]  Dashboard  Project  Files  Review  Support    [Logout] │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  Your Project Timeline                                          │
│  Target Launch: April 15, 2026 (24 days remaining)              │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │                                                          │   │
│  │   ●━━━━━━━●━━━━━━━●━━━━━━━○━━━━━━━○━━━━━━━○━━━━━━━○      │   │
│  │   1       2       3       4       5       6       7      │   │
│  │                                                          │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │ ✅ PHASE 1: DISCOVERY                     Completed      │   │
│  │    Mar 15 - Mar 18                                       │   │
│  │    ────────────────────────────────────────────────      │   │
│  │    ✓ Kickoff call                                        │   │
│  │    ✓ Questionnaire submitted                             │   │
│  │    ✓ Competitor research                                 │   │
│  │    ✓ Site structure defined                              │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │ ✅ PHASE 2: DESIGN                        Completed      │   │
│  │    Mar 18 - Mar 22                                       │   │
│  │    ────────────────────────────────────────────────      │   │
│  │    ✓ Homepage design mockup                              │   │
│  │    ✓ Client approved design                              │   │
│  │    ✓ Interior page designs                               │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │ 🔄 PHASE 3: DEVELOPMENT                   In Progress    │   │
│  │    Mar 22 - Mar 29 (estimated)                           │   │
│  │    ────────────────────────────────────────────────      │   │
│  │    🔄 Building full site in WordPress                    │   │
│  │    ○ Mobile optimization                                 │   │
│  │    ○ Forms & integrations                                │   │
│  │                                                          │   │
│  │    Your action: None required - we're building!          │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │ ⏳ PHASE 4: CONTENT                       Upcoming       │   │
│  │    Mar 29 - Apr 5 (estimated)                            │   │
│  │    ────────────────────────────────────────────────      │   │
│  │    ○ Add your photos & content                           │   │
│  │    ○ Populate all pages                                  │   │
│  │    ○ SEO optimization                                    │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ... (Phases 5, 6, 7 collapsed)                                 │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

**Notes:**
- Visual progress indicator at top
- Expandable/collapsible phase cards
- Clear status indicators (✅ 🔄 ⏳ ○)
- Action items highlighted when relevant
- Dates shown for each phase

---

## 4. File Upload

```
┌─────────────────────────────────────────────────────────────────┐
│  [Logo]  Dashboard  Project  Files  Review  Support    [Logout] │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  Upload Files                                                   │
│  Share your logo, photos, content, and other materials          │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │                                                          │   │
│  │    ┌──────────────────────────────────────────────┐      │   │
│  │    │                                              │      │   │
│  │    │        📁 Drag files here to upload          │      │   │
│  │    │                                              │      │   │
│  │    │              or click to browse              │      │   │
│  │    │                                              │      │   │
│  │    │    PNG, JPG, PDF, DOC up to 25MB each        │      │   │
│  │    │                                              │      │   │
│  │    └──────────────────────────────────────────────┘      │   │
│  │                                                          │   │
│  │  File category:  [ Logo & Branding        ▼ ]            │   │
│  │                                                          │   │
│  │  Notes (optional):                                       │   │
│  │  ┌──────────────────────────────────────────────────┐    │   │
│  │  │                                                  │    │   │
│  │  └──────────────────────────────────────────────────┘    │   │
│  │                                                          │   │
│  │                          [ Upload Files ]                │   │
│  │                                                          │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  YOUR UPLOADED FILES                                            │
│  ┌─────────────────┬────────────────┬───────────┬────────────┐  │
│  │ File            │ Category       │ Date      │ Actions    │  │
│  ├─────────────────┼────────────────┼───────────┼────────────┤  │
│  │ 📄 logo.png     │ Logo & Brand   │ Mar 19    │ [↓] [🗑]   │  │
│  │ 📄 team.jpg     │ Photos         │ Mar 19    │ [↓] [🗑]   │  │
│  │ 📄 services.doc │ Content        │ Mar 18    │ [↓] [🗑]   │  │
│  └─────────────────┴────────────────┴───────────┴────────────┘  │
│                                                                 │
│  WHAT WE NEED FROM YOU                                          │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │ ○ High-resolution logo (PNG or vector)                   │   │
│  │ ○ Photos of your work (5-10 recommended)                 │   │
│  │ ○ Team photos (optional)                                 │   │
│  │ ○ Any existing content you want to reuse                 │   │
│  │ ○ Customer testimonials (text or screenshots)            │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

**Notes:**
- Drag-and-drop upload area
- Category dropdown for organization
- Optional notes field
- Table of previously uploaded files
- Checklist of needed items
- Download and delete actions

---

## 5. Deliverable Review

```
┌─────────────────────────────────────────────────────────────────┐
│  [Logo]  Dashboard  Project  Files  Review  Support    [Logout] │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  Review & Approve                                               │
│  Review deliverables and provide your feedback                  │
│                                                                 │
│  PENDING YOUR REVIEW (1)                                        │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │                                                          │   │
│  │  📐 Homepage Design v2                 ⏳ Awaiting Review │   │
│  │  Submitted: Mar 21, 2026                                 │   │
│  │                                                          │   │
│  │  This is the revised homepage design based on your       │   │
│  │  feedback from version 1. Key changes:                   │   │
│  │  • Larger hero text                                      │   │
│  │  • Green accent color added                              │   │
│  │  • Services section reorganized                          │   │
│  │                                                          │   │
│  │  [Preview in Browser →]  [Download PDF]                  │   │
│  │                                                          │   │
│  │  ─────────────────────────────────────────────────────── │   │
│  │                                                          │   │
│  │  ┌─────────────────────┐  ┌─────────────────────┐        │   │
│  │  │                     │  │                     │        │   │
│  │  │   ✅ APPROVE        │  │   ✏️ REQUEST        │        │   │
│  │  │                     │  │      CHANGES        │        │   │
│  │  └─────────────────────┘  └─────────────────────┘        │   │
│  │                                                          │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  APPROVED (2)                                                   │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │ ✅ Homepage Design v1          Approved Mar 20           │   │
│  │    Changes requested → led to v2                         │   │
│  │                                                          │   │
│  │ ✅ Site Structure & Wireframes Approved Mar 18           │   │
│  │    [View Details]                                        │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘

─────────────────────────────────────────────────────────────────

APPROVAL MODAL:

┌─────────────────────────────────────────────────────────────┐
│                                                             │
│   ✅ Approve: Homepage Design v2                            │
│                                                             │
│   By approving, you confirm this deliverable meets your     │
│   requirements and we can proceed to the next phase.        │
│                                                             │
│   ☑ I approve this deliverable and authorize the team       │
│     to proceed.                                             │
│                                                             │
│   Signed: _________________________________                 │
│           (Type your full name)                             │
│                                                             │
│   [ Cancel ]                     [ Confirm Approval ]       │
│                                                             │
└─────────────────────────────────────────────────────────────┘

─────────────────────────────────────────────────────────────────

CHANGE REQUEST MODAL:

┌─────────────────────────────────────────────────────────────┐
│                                                             │
│   ✏️ Request Changes: Homepage Design v2                    │
│                                                             │
│   Please describe the changes you'd like us to make:        │
│                                                             │
│   ┌─────────────────────────────────────────────────────┐   │
│   │                                                     │   │
│   │                                                     │   │
│   │                                                     │   │
│   └─────────────────────────────────────────────────────┘   │
│                                                             │
│   Attach reference image (optional): [Choose File]          │
│                                                             │
│   [ Cancel ]                     [ Submit Feedback ]        │
│                                                             │
└─────────────────────────────────────────────────────────────┘
```

**Notes:**
- Pending items prominently displayed
- Preview options (browser, PDF)
- Clear approve/change request actions
- Modal confirmations for both actions
- History of previous approvals
- Feedback textarea with attachment option

---

## 6. Credentials Page (Post-Launch)

```
┌─────────────────────────────────────────────────────────────────┐
│  [Logo]  Dashboard  Project  Files  Review  Support    [Logout] │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  Your Site Credentials                                          │
│  Access details for your live website                           │
│                                                                 │
│  ⚠️ Keep these credentials secure. Only share with trusted      │
│     team members.                                               │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │  WORDPRESS ADMIN                                         │   │
│  │  ─────────────────────────────────────────────────────── │   │
│  │                                                          │   │
│  │  Admin URL:    yoursite.com/wp-admin                     │   │
│  │  Username:     admin@yourcompany.com                     │   │
│  │  Password:     ●●●●●●●●●●●●  [👁 Show] [📋 Copy]          │   │
│  │                                                          │   │
│  │  [Log In to WordPress →]                                 │   │
│  │                                                          │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │  HOSTING INFORMATION                                     │   │
│  │  ─────────────────────────────────────────────────────── │   │
│  │                                                          │   │
│  │  Hosting Provider:  Hostinger                            │   │
│  │  (Managed by TBDesigned - no action needed)              │   │
│  │                                                          │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │  DOMAIN REGISTRAR                                        │   │
│  │  ─────────────────────────────────────────────────────── │   │
│  │                                                          │   │
│  │  Domain:        yourcompany.com                          │   │
│  │  Registrar:     GoDaddy                                  │   │
│  │  Renewal Date:  March 15, 2027                           │   │
│  │  (You own this - keep your registrar login safe)         │   │
│  │                                                          │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  SECURITY RECOMMENDATIONS                                       │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │ ○ Change your password after first login                 │   │
│  │ ○ Enable two-factor authentication                       │   │
│  │ ○ Don't share credentials via unencrypted email          │   │
│  │ ○ Contact us if you suspect unauthorized access          │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  Need help? [Contact Support →]                                 │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

**Notes:**
- Only visible after project launch
- Password hidden by default with reveal option
- Copy button for credentials
- Security warnings prominent
- Direct login link
- Hosting info (managed by TBDesigned)
- Domain info (owned by client)

---

## 7. Support Page

```
┌─────────────────────────────────────────────────────────────────┐
│  [Logo]  Dashboard  Project  Files  Review  Support    [Logout] │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  Support                                                        │
│  Need help? Submit a request and we'll get back to you.        │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐   │
│  │  SUBMIT A REQUEST                                        │   │
│  │                                                          │   │
│  │  Request type:                                           │   │
│  │  [ Content Update              ▼ ]                       │   │
│  │                                                          │   │
│  │  Priority:                                               │   │
│  │  ○ Normal    ○ High    ○ Urgent (site down)              │   │
│  │                                                          │   │
│  │  Describe your request:                                  │   │
│  │  ┌──────────────────────────────────────────────────┐    │   │
│  │  │                                                  │    │   │
│  │  │                                                  │    │   │
│  │  └──────────────────────────────────────────────────┘    │   │
│  │                                                          │   │
│  │  Attach file (optional): [Choose File]                   │   │
│  │                                                          │   │
│  │                        [ Submit Request ]                │   │
│  │                                                          │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  YOUR REQUESTS                                                  │
│  ┌───────┬────────────────────────┬──────────┬────────────────┐ │
│  │ ID    │ Subject                │ Status   │ Last Updated   │ │
│  ├───────┼────────────────────────┼──────────┼────────────────┤ │
│  │ #003  │ Update phone number    │ 🟢 Done  │ Mar 20, 2026   │ │
│  │ #002  │ Add new service page   │ 🟡 Open  │ Mar 19, 2026   │ │
│  │ #001  │ Fix typo on homepage   │ 🟢 Done  │ Mar 15, 2026   │ │
│  └───────┴────────────────────────┴──────────┴────────────────┘ │
│                                                                 │
│  Click a request to view details and conversation.              │
│                                                                 │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  QUICK ANSWERS                                                  │
│                                                                 │
│  ▸ How do I request a content update?                           │
│  ▸ What's included in my monthly updates?                       │
│  ▸ How long do updates take?                                    │
│  ▸ What if my site goes down?                                   │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

**Notes:**
- Submit form at top
- Request type dropdown (Content Update, Bug Report, Feature Request, General, Urgent)
- Priority selector
- File attachment option
- History table with status
- Click to expand ticket details
- FAQ accordion at bottom

---

## 8. Mobile Layouts

### Mobile Navigation
```
┌─────────────────────────┐
│ [Logo]        [☰ Menu]  │
└─────────────────────────┘

Menu expanded:
┌─────────────────────────┐
│            [X Close]    │
│                         │
│   Dashboard             │
│   Project Timeline      │
│   Upload Files          │
│   Review & Approve      │
│   Support               │
│   Credentials           │
│                         │
│   ─────────────────     │
│   Logout                │
│                         │
└─────────────────────────┘
```

### Mobile Dashboard
```
┌─────────────────────────┐
│ [Logo]          [☰]     │
├─────────────────────────┤
│                         │
│ Welcome, [Name]!        │
│                         │
│ ┌─────────────────────┐ │
│ │  PROJECT STATUS     │ │
│ │                     │ │
│ │  ████████░░ 60%     │ │
│ │                     │ │
│ │  Development Phase  │ │
│ │  Launch: Apr 15     │ │
│ │                     │ │
│ │  [View Timeline →]  │ │
│ └─────────────────────┘ │
│                         │
│ ┌─────────────────────┐ │
│ │ ⚠️ ACTION NEEDED    │ │
│ │                     │ │
│ │ Review homepage     │ │
│ │ design              │ │
│ │                     │ │
│ │ [Review Now →]      │ │
│ └─────────────────────┘ │
│                         │
│ RECENT ACTIVITY         │
│ • Mar 21 - New file...  │
│ • Mar 19 - Upload...    │
│ • Mar 18 - Milestone... │
│                         │
│ ┌──────┐ ┌──────┐       │
│ │Files │ │Review│       │
│ └──────┘ └──────┘       │
│ ┌──────┐ ┌──────┐       │
│ │Supprt│ │Creds │       │
│ └──────┘ └──────┘       │
│                         │
└─────────────────────────┘
```

**Notes:**
- Hamburger menu navigation
- Single column layout
- Stacked cards
- Touch-friendly buttons (44px min)
- Simplified tables (card view)
- Bottom navigation option for quick access

---

## Design Tokens

### Colors
```
Primary Blue:    #1E3A5F
Secondary Teal:  #2DD4BF
Accent Orange:   #F97316
Success Green:   #22C55E
Warning Yellow:  #EAB308
Error Red:       #EF4444
Background:      #F9FAFB
Card Background: #FFFFFF
Text Primary:    #1F2937
Text Secondary:  #6B7280
Border:          #E5E7EB
```

### Status Indicators
```
✅ Complete / Success:  Green (#22C55E)
🔄 In Progress:         Blue (#3B82F6)
⏳ Upcoming / Pending:  Gray (#9CA3AF)
⚠️ Needs Attention:     Orange (#F97316)
❌ Error / Problem:     Red (#EF4444)
```

### Typography
```
Headings:    Inter/Poppins, Bold
Body:        Inter, Regular
Font Sizes:  14px base, 16px body, 18-32px headings
Line Height: 1.5 for body, 1.2 for headings
```

### Spacing
```
XS:   4px
SM:   8px
MD:   16px
LG:   24px
XL:   32px
2XL:  48px
```

### Border Radius
```
SM:   4px
MD:   8px
LG:   12px
Full: 9999px (pills)
```
