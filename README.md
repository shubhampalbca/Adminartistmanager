# Admin Arti Manager

Laravel-based application for managing admins, users, managers, and events.

## Requirements

- PHP 8.1+
- Composer
- MySQL / MariaDB
- Node.js & NPM (optional, for frontend assets)

## Setup

1. **Clone & install**

   ```bash
   composer install
   ```

2. **Environment**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Edit `.env` and set your `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.

3. **Database (fresh)**

   DB delete karke sab tables migrations se create karte hain:

   ```bash
   php artisan migrate:fresh --seed
   ```

   - Saari tables ek hi baar create hoti hain (koi alter migration nahi).
   - Sirf **admin** seeder se create hota hai.
   - **Users** aur **Managers** app se (register / admin panel) create hote hain.

## Default Admin (Seeder)

| Field    | Value            |
| -------- | ---------------- |
| Email    | `admin@admin.com` |
| Password | `password`       |

Login ke baad password change kar lena.

## Roles

| Role    | Guard   | Table     | Creation              |
| ------- | ------- | --------- | --------------------- |
| Admin   | `admin` | `admins`  | Seeder (single)       |
| User    | `user`  | `users`   | App (registration)    |
| Manager | `manager` | `managers` | App (admin/register) |

## Migrations (Tables)

- `users` – name, email, mobile, profile, status, category, otp, etc.
- `admins` – name, email, mobile, profile, password.
- `managers` – name, username, email, mobile, gender, password, use_password.
- `events` – title, description, file, user_id, postable_type, postable_id (polymorphic).

Sab tables **create** migrations se hi banti hain; alter migrations use nahi hoti.

## Commands

| Command                    | Description                          |
| -------------------------- | ------------------------------------ |
| `php artisan migrate:fresh --seed` | DB drop, migrate, sirf admin seed |
| `php artisan serve`        | Local server (default: http://127.0.0.1:8000) |

## License

MIT.
