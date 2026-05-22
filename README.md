# EasyColoc — Shared Housing Management Platform
 
**EasyColoc** is a web platform that simplifies life in shared housing (*colocation*). It solves the problem of managing shared expenses and roommate coordination by letting users create or join a colocation, track shared costs, split payments automatically, and invite new members — all from one place.
 
---
 
## 🛠️ Tech Stack
 
| Layer | Technology |
|---|---|
| Backend | Laravel 12 (PHP 8.2) |
| Frontend | Blade Templates + Tailwind CSS v3 + Alpine.js |
| Database | MySQL |
| Email | Gmail SMTP (Laravel Mailable) |
| Auth | Laravel Breeze |
| Build Tool | Vite |
| Containerization | Docker |
 
---
 
## ✨ Features
 
### 👤 Authentication
- Register and login (via Laravel Breeze)
- First registered user automatically becomes **admin**
- Profile editing and account deletion
- Banned user middleware — banned users are blocked from all actions
### 🏠 Colocation Management
- Create a new colocation (one active colocation per user at a time)
- View all your colocations (active and cancelled)
- Cancel a colocation (owner only — all memberships are closed)
- Leave a colocation with automatic **reputation scoring**:
  - ✅ All payments settled → **+1 reputation**
  - ❌ Unpaid balance on exit → **−1 reputation**
- Owner can remove a member (their unpaid payments are transferred to the owner)
### 📧 Invitations
- Owner invites roommates by **email**
- Invitation email is sent automatically via Gmail SMTP
- Invited user can **accept** (joins the colocation) or **reject** the invitation
- If the invited user has no account, they are redirected to register first
### 💸 Expense & Payment Management
- Add shared expenses with a category, amount, payer, and purchase date
- Expenses are **automatically split equally** among all active members
- The payer's share is marked as paid immediately
- Other members can mark their share as paid
- Delete expenses
- View all unpaid payments per colocation
### 🗂️ Categories
- Create custom expense categories per colocation (e.g. Courses, Loyer, Électricité)
- Category CRUD with policy-based authorization (owner only)
### 🛡️ Admin Panel
- View all registered users
- Ban / unban users
- Admin dashboard with platform overview
---
 
## 🗄️ Database Models
 
`User`, `Colocation`, `Membership`, `Expense`, `Payment`, `Category`, `Invitation`, `Reputation`
 
---

## 🎯 Project Goal
 
This is a **full-stack school / portfolio project** built to practice:
- Full-stack Laravel development (MVC, middleware, policies, form requests, mailables)
- Many-to-many relationships with pivot data (memberships with roles and timestamps)
- Business logic: automatic expense splitting, payment tracking, reputation system
- Email invitation flow with tokenized links
- Role-based access control (admin vs user vs owner vs member)
- Responsive UI with Tailwind CSS and Alpine.js
---
 
## 👩‍💻 Author
 
**Mouna Saiss** — Computer Science Engineering Student
