# 📁 Project: Personal Portfolio Website

A modern, single-page portfolio website built with **Laravel 12**, **Inertia.js**, and **Vue 3** to showcase personal and professional information, along with a secure admin panel.

---

## 🚀 Tech Stack

- **Backend:** Laravel 12 (MVC, `Auth::` authentication)
- **Frontend:** Vue 3 + Inertia.js
- **Routing:** Inertia-powered SPA routing
- **Authentication:**
  - Admin login with `Auth::attempt()`
  - Password reset with token system
- **Email:** Admin email send interface

---

## 📄 Pages

### 🧑‍💼 Public Pages
- `/` — Home
- `/about` — About
- `/resume` — Resume
- `/services` — Services
- `/contact` — Contact

### 🔐 Admin Pages
- `/login` — Admin Login
- `/admin/send-email` — Send Email
- `/reset-password/{token}` — Reset Password

---

## ✅ Features

- ✅ Inertia.js-based SPA (no full reloads)
- ✅ Admin authentication using Laravel `Auth::`
- ✅ Password reset flow with token verification
- ✅ Clean and reusable Vue components
- ✅ Secure validation and error feedback
- ✅ Easily extendable structure

---

## 📦 Future Improvements *(optional)*
- Add blog or project listing
- Integrate contact form submissions with DB
- Deploy on Laravel Forge or shared hosting

---

> **Note:** Built to demonstrate real-world Laravel & Vue.js SPA structure with a clean UX/UI.
---
> Running
