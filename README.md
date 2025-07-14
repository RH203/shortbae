# 🚀 Shortbae — Simple URL Shortener

Shortbae is a clean and simple URL shortener built with **Laravel 11**, **Livewire**, and **Tailwind CSS**.  
It's completely free, with **no ads**, **no tracking**, and designed for easy deployment even on **shared hosting (cPanel)**.

## 🧪 Upcoming Features

- 🔑 Password-protected short links  
- 📎 QR Code generation  
- 📈 Link analytics and stats

## 🌟 Features

- 🔐 User authentication (Spatie Roles & Permissions)
- 🔗 Custom and auto-generated short URLs
- ⏳ Optional expiration dates for each link
- 📊 Basic analytics: visit count
- ⚙️ Deployed using Laravel traditional `public` folder setup (not Vite-based)

---

## 🚀 Getting Started

### 🔄 Clone the repository:

```bash
git clone https://github.com/rh203/shortbae.git
cd shortbae
```

### 🌿 Switch to development branch:
```bash
git checkout dev
```

### 💡 You can explore other branches using:
```bash
git branch -a
```

## 🛠️ Requirements
- PHP >= 8.2
- Composer
- MySQL / MariaDB
- Node.js (if running Vite locally)
- Laravel CLI

## ⚙️ Setup Instructions

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

## 📏 Contribution Rules
If you'd like to contribute, please follow these rules:
- 🔄 Create a feature branch:
```bash
git checkout -b feature/your-feature-name
```
- 🔍 Avoid pushing directly to main branch
- 📦 Use clear commit messages

## 📬 Contact
Feel free to open an issue or discussion if you want to contribute or report a bug.

