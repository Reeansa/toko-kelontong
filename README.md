# FINAL PROJECT INCUBIX | RAIHAN FEBRIYANSAH
## Studi Kasus
Pak Ipul merupakan pemilik toko klontong yang menjual berbagai barang, saat ini Pak Ipul sedang kesusahan dalam pendataan barang karena masih menggunakan pembukuan, yang mana cara tersebut masih sangat tradisional. Oleh karena itu Pak Ipul ingin memiliki sebuah website pendataan barang, agar lebih memudahkan Pak Ipul dalam melakukan pendataan barang di toko klontongnya. Buatlah website pendataan data barang untuk toko Pak Ipul, dengan fitur sebagai berikut:
1. Memasukan data barang
2. Menghapus data barang
3. Melihat data barang
4. Mengupdate data barang

## Setting dengan Git
1. buat .env terlebih dahulu dikarenakan saat clone .env tidak ada
   ```
   cp .env.example .env
   ```
2. pada .env bagian `DB_DATABASE` sesuaikan dengan nama database yang di inginkan
3. lalu generate app_key
   ```
   php artisan key:generate
   ```
4. Install dependensi JavaScript menggunakan npm
   ```
   npm install
   ```
   atau yarn
   ```
    yarn install
   ```
5. Install dependensi PHP menggunakan Composer
   ```
   composer install
   ```
6. migrate database terlebih dahulu
   ```
   php artisan migrate:fresh
   ```
7. jika ingin menggunakan seeder (dengan data dummy) lakukan/jalankan perintah
   ```
   php artisan db:seed
   ```
8. jalankan vite untuk tailwind css
   ```
   npm run dev
   ```
   agar lebih mudah langsung di build saja
   ```
   npm run build
   ```
10. jalankan laravel
    ```
    php artisan serve
    ```
## Akun untuk Login
1. admin
   ```
   Email : admin@gmail.com
   Password : admin123
   ```
2. user
   ```
   Email : user@gmail.com
   Password : user123
   ```
3. user non-aktif
   ```
   Email : nonaktif@gmail.com
   Password : nonaktif123
   ```
## Tambahan
dalam project ini sudah terdapat CRUD sesuai dengan studi kasus yang disediakan namun terdapat beberapa tambahan, diantaranya: 
1. terdapat login page

   ![image](https://github.com/Reeansa/toko-kelontong/assets/92510276/a130df5d-8d04-4d70-9d44-e07e59752d2c)
2. terdapat _error handling_ ketika terdapat kesalahan baik fitur **login** dan fitur **registrasi**
   * error (validasi login) ketika email dan password tidak di input
     ![image](https://github.com/Reeansa/toko-kelontong/assets/92510276/eb12931f-a376-46a5-9593-6d5123b00747)
   * error (validasi login) ketika email tidak disertai email yang benar
     ![image](https://github.com/Reeansa/toko-kelontong/assets/92510276/f820d6db-3b78-4e5e-93c9-ee1df0da712d)
   * error (validasi login) ketika password kurang dari 6 karakter
     ![image](https://github.com/Reeansa/toko-kelontong/assets/92510276/eddda8f4-d589-42b0-9912-23b8e4111dd2)
   * error (validasi login) ketika users yang login ber-status **nonaktif**
  
     ![image](https://github.com/Reeansa/toko-kelontong/assets/92510276/6c2ca994-52c2-40c1-9fa8-0d4f771516c8)
   * error (validasi registrasi) ketika keseluruhan tidak di lakukan input
     ![image](https://github.com/Reeansa/toko-kelontong/assets/92510276/7125b11a-dd53-4a88-99bf-96bea4642d44)
    * error (validasi registrasi) ketika email sudah digunakan maka tidak bisa melakukan registrasi
      ![image](https://github.com/Reeansa/toko-kelontong/assets/92510276/fc4e6e7e-83a0-47f4-991f-0c3a795e4737)
3. terdapat middleware auth, jadi ketika users belum login hanya bisa mengakses **'dashboard'** dengan status sebagai **'Guest'**
   ![image](https://github.com/Reeansa/toko-kelontong/assets/92510276/fe52accc-de98-49e8-8112-8a143a862d53)
4. users yang digunakan ber-status **'admin'** maka bisa mengakses **'dashboard', 'users', 'barang'**
   ![image](https://github.com/Reeansa/toko-kelontong/assets/92510276/b9314078-2411-423d-b97a-056d783ffc98)
5. users yang digunakan ber-status **'users'** maka bisa mengakses **'dashboard', 'barang'**
   ![image](https://github.com/Reeansa/toko-kelontong/assets/92510276/da696dee-aa5c-4d93-a044-7b102d194421)

## Kesimpulan
project yang dibuat ini tidak hanya CRUD (Create, Read, Update, Delete) untuk data barang, tapi bisa melakukan login berdasarkan status dan role masing-masing dan memberikan akses ke setiap fitur untuk melakukan CRUD tersebut sesuai dengan role masing-masing
