# TBDesigned Client Portal Specification

## Overview

The Client Portal is a key differentiator for TBDesigned. It transforms the client experience from "waiting for emails" to "full visibility into my project."

**URL:** tbdesigned.io/client-portal (login required)

---

## Core Objectives

1. **Transparency** — Clients always know where their project stands
2. **Efficiency** — Reduce back-and-forth emails for file transfers
3. **Professionalism** — Make clients feel they're working with a real agency
4. **Self-Service** — Let clients help themselves when possible
5. **Automation** — Enable AI-powered workflows and notifications

---

## User Roles

### Client
- View their own project
- Upload documents
- Review and approve deliverables
- Submit support requests
- Access site credentials (post-launch)

### Admin (Tyler)
- View all projects
- Update project status
- Upload files for client review
- Manage milestones
- Respond to support requests
- Grant/revoke access

---

## Implementation Approach

### Phase 1: WordPress + Plugins (MVP)
**Timeline:** Build alongside main site (1-2 weeks)

**Tech Stack:**
- WordPress (same installation as main site)
- Ultimate Member or WP-Members (user login/registration)
- Advanced Custom Fields Pro (custom fields for projects)
- Frontend Post/Page plugin (client-side forms)
- Elementor (dashboard page design)

**Pros:**
- Single platform (WordPress)
- Tyler knows the stack
- Fast to implement
- Low cost

**Cons:**
- Limited interactivity
- Plugin dependency
- Less "app-like" feel

---

### Phase 2: Enhanced Dashboard (Future)
**Timeline:** When client base grows (3-6 months)

**Options:**

**A) Custom React App**
- Next.js frontend
- WordPress REST API backend
- Hosted on Vercel/Netlify
- Full custom experience

**B) No-Code Stack**
- Airtable for data
- Softr or Stacker for portal frontend
- Zapier for automations
- Embed in WordPress via iframe

**C) Existing SaaS**
- ManyRequests
- Dubsado
- HoneyBook
- More full-featured but monthly cost

---

## Phase 1 Detailed Spec (MVP)

### User Flow

```
1. Client receives welcome email with login link
2. Client creates account or receives credentials
3. Client logs in → sees personalized dashboard
4. Dashboard shows:
   - Project overview
   - Current phase/milestone
   - Recent activity
   - Action items (if any)
5. Client can:
   - View project timeline
   - Upload files
   - Review deliverables
   - Approve milestones
   - Submit support tickets
```

---

### Pages & Screens

#### Login Page (/client-portal)
**Elements:**
- TBDesigned branding
- Email/password fields
- "Forgot Password" link
- Support contact info
- Redirect to dashboard on success

---

#### Dashboard Home (/client-portal/dashboard)
**Welcome Section:**
- "Welcome, [Client Name]"
- Company name display
- Quick stats (project phase, days until launch, etc.)

**Project Status Card:**
- Visual timeline/progress bar
- Current phase highlighted
- Next milestone and date
- Status badge (In Progress, Awaiting Review, Launched, etc.)

**Recent Activity:**
- Timeline of updates
- "New file uploaded," "Milestone completed," etc.
- Timestamps

**Action Items:**
- Things needing client attention
- Approvals pending
- Documents needed
- Clear CTAs

**Quick Links:**
- Upload Files
- View Deliverables  
- Contact Support
- FAQs

---

#### Project Timeline (/client-portal/project)
**Visual Timeline showing:**

| Phase | Status | Details |
|-------|--------|---------|
| 1. Discovery | ✅ Complete | Kickoff call, questionnaire submitted |
| 2. Design | 🔄 In Progress | Homepage mockup under review |
| 3. Development | ⏳ Upcoming | Full site build |
| 4. Content | ⏳ Upcoming | Copy and images populated |
| 5. Review | ⏳ Upcoming | Client review and revisions |
| 6. Launch | ⏳ Upcoming | Site goes live |
| 7. Post-Launch | ⏳ Upcoming | Final handoff and training |

**For Each Phase (expanded view):**
- Description of what happens
- Deliverables
- Client responsibilities
- Due date/timeline
- Notes/comments

---

#### File Upload (/client-portal/upload)
**Purpose:** Clients submit assets and documents

**Categories:**
- Logo files
- Brand guidelines
- Photos
- Content documents
- Testimonials
- Credentials
- Other

**Upload Form:**
- Drag-and-drop area
- Category selector
- Notes/description field
- Submit button

**Previously Uploaded:**
- List of files submitted
- Date uploaded
- Category
- Download link

---

#### Deliverables Review (/client-portal/review)
**Purpose:** Clients review and approve work

**For Each Deliverable:**
- Title (e.g., "Homepage Design - Draft 1")
- Date submitted
- Description
- Preview/link
- Status (Pending Review, Approved, Changes Requested)
- Action buttons:
  - [Approve ✓]
  - [Request Changes]
  - [Add Comment]

**Change Request Form:**
- Select deliverable
- Describe changes needed
- Priority level
- Submit button

**Approval Confirmation:**
- Clear language about what approval means
- Checkbox: "I approve this deliverable"
- E-signature or typed name
- Timestamp recorded

---

#### Site Credentials (/client-portal/credentials)
**Visible:** Only after launch
**Restricted:** Sensitive information display

**Displays:**
- WordPress admin URL
- Username
- Password (hidden by default, click to reveal)
- Hosting information
- Domain registrar info
- Important security notes

**Security:**
- 2FA reminder
- Password change prompt
- "Only share with trusted team members"

---

#### Support (/client-portal/support)
**Purpose:** Ongoing support and update requests

**Submit Request Form:**
- Request type dropdown:
  - Content update
  - Bug report
  - Feature request
  - General question
  - Urgent issue
- Description
  - Priority (Normal, High, Urgent)
- File attachment option
- Submit button

**Previous Requests:**
- List of submitted tickets
- Status (Open, In Progress, Resolved)
- Last update date
- Click to view details/conversation

---

### Technical Implementation (WordPress)

#### Required Plugins

| Plugin | Purpose | Cost |
|--------|---------|------|
| Ultimate Member | User registration, login, profiles | Free/$249/yr |
| ACF Pro | Custom fields for projects | $49/yr |
| WPForms | Forms for upload, support | Free/$49/yr |
| Members | Role-based access control | Free |
| Email Log | Track notifications | Free |

#### Custom Post Types

**Projects**
```php
// Custom fields (ACF):
- client_user (User relationship)
- client_company (Text)
- project_status (Select: Discovery, Design, Development, Content, Review, Launch, Post-Launch, Completed)
- start_date (Date)
- target_launch_date (Date)
- actual_launch_date (Date)
- notes (Textarea)
```

**Milestones**
```php
// Custom fields (ACF):
- project (Post relationship)
- milestone_name (Text)
- milestone_description (Textarea)
- status (Select: Upcoming, In Progress, Completed)
- due_date (Date)
- completed_date (Date)
- requires_approval (True/False)
- approved (True/False)
- approved_date (Date)
```

**Deliverables**
```php
// Custom fields (ACF):
- project (Post relationship)
- milestone (Post relationship)
- deliverable_name (Text)
- description (Textarea)
- file_url (File/URL)
- preview_url (URL)
- status (Select: Draft, Pending Review, Approved, Changes Requested)
- client_feedback (Textarea)
- submitted_date (Date)
- approved_date (Date)
```

**Support Tickets**
```php
// Custom fields (ACF):
- project (Post relationship)
- ticket_type (Select: Content Update, Bug Report, Feature Request, General, Urgent)
- priority (Select: Normal, High, Urgent)
- description (Textarea)
- attachments (File)
- status (Select: Open, In Progress, Resolved)
- response (Textarea)
- submitted_date (Date)
- resolved_date (Date)
```

**Client Files**
```php
// Custom fields (ACF):
- project (Post relationship)
- file_category (Select: Logo, Photos, Content, Testimonials, Credentials, Other)
- file (File)
- notes (Textarea)
- uploaded_date (Date)
```

---

#### Page Templates (Elementor)

Each portal page uses Elementor with dynamic content:

1. **Dashboard** — Query current user's project, display milestones, activity
2. **Timeline** — Visual display of project phases with status
3. **Upload** — WPForms form, ACF gallery of previous uploads
4. **Review** — Loop through deliverables, action buttons
5. **Credentials** — Conditional display, security styling
6. **Support** — Form + previous tickets loop

---

### Email Notifications

**To Client:**
- Welcome email (on account creation)
- New deliverable ready for review
- Milestone completed
- Support ticket response
- Project status update
- Launch notification

**To Admin (Tyler):**
- New file uploaded
- Deliverable feedback submitted
- Approval received
- New support ticket
- Change request received

**Templates:** Use FluentCRM or WP Mail SMTP + templates

---

### Onboarding Flow

1. **New client signs contract**
2. **Admin creates project in WordPress**
   - New "Project" post
   - Link to new user account
   - Set initial status/milestones
3. **System sends welcome email**
   - Account credentials
   - Login link
   - "What happens next" guide
4. **Client logs in, sees dashboard**
   - Welcome message
   - Onboarding questionnaire link
   - First steps checklist
5. **Client submits questionnaire**
   - ACF form or Gravity Forms
   - Populates project brief
6. **Admin marks Discovery complete**
   - Client notified
   - Timeline updates

---

### Security Considerations

- **SSL required** — All portal pages over HTTPS
- **Strong passwords** — Enforce on registration
- **Session timeout** — Logout after inactivity
- **Role restrictions** — Clients only see their project
- **File access** — Protect uploaded files from public access
- **Credentials protection** — Only show after login, mask passwords
- **Audit log** — Track who accessed what, when

---

## Future Enhancements (Phase 2+)

### Agentic Integration Points

**Automated Onboarding:**
```
New project created →
  Zapier/Make webhook →
  Create Airtable record →
  Trigger welcome sequence →
  Generate onboarding questionnaire →
  AI drafts initial content based on responses
```

**Status Update Automation:**
```
Milestone marked complete →
  Update project status →
  Send client notification →
  Post update to client's activity feed →
  If final milestone, trigger launch sequence
```

**AI Content Generation:**
```
Client completes questionnaire →
  Send to AI content generator →
  Generate draft homepage copy →
  Create deliverable for review →
  Notify client
```

**Support Triage:**
```
New support ticket →
  AI analyzes content →
  Auto-categorize priority →
  Suggest response (admin review) →
  Auto-reply for common questions
```

---

### Feature Wishlist

- Real-time chat/comments on deliverables
- Video review/feedback (Loom embed)
- Client invoice/payment section
- Document signing (HelloSign embed)
- Client referral tracking
- Satisfaction surveys
- Training video library
- Knowledge base

---

## Wireframes

See: `/website/dashboard/wireframes/` (to be created)

### Page Mockups Needed:
1. Login page
2. Dashboard home
3. Project timeline
4. File upload
5. Deliverable review
6. Credentials page
7. Support ticket form
8. Mobile versions of above

---

## Success Metrics

| Metric | Target |
|--------|--------|
| Client login rate | 80%+ use portal |
| Support emails | Reduce by 50% |
| Approval turnaround | <48 hours |
| Client satisfaction | 9+ NPS |
| File collection | 100% via portal |

---

## Implementation Checklist

### Pre-Build
- [ ] Install required plugins
- [ ] Configure Ultimate Member
- [ ] Create custom post types (ACF)
- [ ] Set up user roles

### Build
- [ ] Design login page
- [ ] Design dashboard page
- [ ] Design timeline page
- [ ] Design upload page
- [ ] Design review page
- [ ] Design credentials page
- [ ] Design support page
- [ ] Configure forms
- [ ] Set up email templates

### Testing
- [ ] Test client registration flow
- [ ] Test file uploads
- [ ] Test deliverable review flow
- [ ] Test support submission
- [ ] Test email notifications
- [ ] Test mobile responsiveness
- [ ] Test role restrictions
- [ ] Test security measures

### Launch
- [ ] Create test client account
- [ ] Document admin workflows
- [ ] Create client onboarding guide
- [ ] Soft launch with first client
- [ ] Iterate based on feedback
