Muhammad Akbar Din Islami (2495114049)

## Cara Menjalankan
1. Buka folder proyek di MAMP → `htdocs/inventaris`
2. Salin `.env.example` jadi `.env`
3. Siapkan database di phpMyAdmin
4. Jalankan perintah:
```bash
composer install
php artisan key:generate
php artisan migrate
php artisan serve