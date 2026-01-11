# Damiana Project 🚀

This is a Laravel application built with **Vue.js (Inertia)** and **TypeScript**.
The project uses **Wayfinder** for route management, which requires generating static route files to ensure Vite can resolve them during the build process.

---

## 🛠 Option 1: Development via Laravel Sail (Docker)

Use this method if you want a pre-configured environment without installing PHP or MySQL locally.

### 1. Initial Setup (Fresh Install)
If you just cloned the project and don't have PHP installed, use this helper to install dependencies:
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

```bash
cp .env.example .env
# Open .env and set DB_HOST=mysql
# To fix potential Windows line-ending issues:
sed -i 's/\r$//' .env
```

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
```

## Option 2: Native WSL2 Setup (Direct)
```bash
composer install
npm install
```

### 2. Configuration
Copy .env.example to .env.

Set DB_HOST=127.0.0.1 and DB_PORT=3306.

Run:
```bash
php artisan key:generate
php artisan migrate
php artisan wayfinder:generate

npm run dev
```

