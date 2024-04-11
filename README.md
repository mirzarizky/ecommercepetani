## Username Password Role
| Username | Password | Role |
| ----------- | ----------- | ----------- |
| admin@gmail.com | password | admin |
| seller@gmail.com | password | seller |
| customer@gmail.com | password | customer |

## Instalasi
1. Buka Terminal. (ex: git bash, cmd, dll)
2. Clone repository ini menggunakan perintah `git clone https://github.com/stay-coding/fwrk-ecommerce-petani.git ecommerce-petani`
3. Change direktory menggunakan perintah `cd ecommerce-petani`
4. Masukkan perintah `composer install` untuk menginstall data vendor
5. Masukkan perintah `cp .env.example .env` untuk menyalin file `.env`
6. Masukkan perintah `php artisan key:generate` untuk mengenerate APP_KEY
7. Pastikan database beserta username password sudah sesuai di .env
8. Masukkan perintah `php artisan migrate` untuk melakukan migrasi database
9. Jika terdapat inputan di terminal tulis `yes` kemudian enter
10. Masukkan perintah `php artisan migrate:fresh --seed` agar DatabaseSeeder dijalankan dan membuat data di database
11. Buka file .env dan sesuaikan `APP_URL` dengan URL aplikasi/server anda
12. Masukkan perinta `php artisan ser` untuk memulai server
13. Buka browser dan akses `http://127.0.0.1:8000` untuk membuka aplikasinya

