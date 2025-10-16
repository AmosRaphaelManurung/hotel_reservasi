# Hotel Reservation System (Sistem Pemesanan Kamar Hotel)

Sistem pemesanan kamar hotel berbasis web yang dibangun menggunakan Laravel.

## Fitur Utama

- ✅ **Form Booking**: Formulir pemesanan dengan validasi lengkap
  - Nama tamu
  - Tanggal check-in dan check-out
  - Tipe kamar (Standard, Deluxe, Suite, Family, Presidential)
  - Jumlah tamu
  - Pilih kamar spesifik (opsional) 

- ✅ **Validasi**: 
  - Tanggal check-out harus lebih besar dari check-in
  - Validasi format tanggal
  - Validasi required fields

- ✅ **Penyimpanan Data**:
  - Data disimpan di database SQLite
  - Data juga disimpan di localStorage browser untuk backup

- ✅ **Daftar Booking**:
  - Menampilkan semua booking dari database
  - Menampilkan booking dari localStorage
  - Tombol hapus data localStorage

- ✅ **Filter Booking**:
  - Filter booking berdasarkan tipe kamar
  - Berlaku untuk data database dan localStorage

- ✅ **UI Sederhana**:
  - Design minimalis dan responsive
  - Mudah digunakan
  - Navigasi yang jelas

## Teknologi yang Digunakan

- **Backend**: Laravel 11.x
- **Database**: SQLite
- **Frontend**: Blade Template, HTML, CSS, JavaScript
- **Storage**: Database + LocalStorage

## Cara Instalasi

1. Clone repository ini
```bash
git clone <repository-url>
cd hotel_reservasi
```

2. Install dependencies
```bash
composer install
```

3. Copy file .env
```bash
copy .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Jalankan migration dan seeder
```bash
php artisan migrate:fresh --seed
```

6. Jalankan server development
```bash
php artisan serve
```

7. Akses aplikasi di browser
```
http://127.0.0.1:8000
```

## Struktur Database

### Tabel: rooms
- id
- name (nama kamar)
- type (tipe kamar)
- price (harga)
- description (deskripsi)
- is_available (status ketersediaan)
- timestamps

### Tabel: bookings
- id
- guest_name (nama tamu)
- check_in (tanggal check-in)
- check_out (tanggal check-out)
- room_type (tipe kamar)
- guest_count (jumlah tamu)
- room_id (foreign key ke tabel rooms)
- timestamps

## Fitur LocalStorage

Data booking juga disimpan di localStorage browser dengan key `hotelBookings`. Ini memungkinkan:
- Data tetap tersimpan meskipun browser ditutup
- Backup data di sisi client
- Dapat dihapus kapan saja melalui tombol "Hapus Data LocalStorage"

## Screenshot

### 1. Form Booking
Halaman untuk membuat booking baru dengan validasi lengkap.

### 2. Daftar Booking
Menampilkan semua booking dari database dan localStorage dengan fitur filter.

## Pengembangan Selanjutnya

Beberapa fitur yang bisa ditambahkan:
- [ ] Autentikasi user
- [ ] Update dan delete booking
- [ ] Perhitungan total harga
- [ ] Status pembayaran
- [ ] Export data ke PDF/Excel
- [ ] Email konfirmasi booking
- [ ] Dashboard admin
- [ ] Pencarian booking

## Kontributor

Setiap anggota kelompok harus berkontribusi melalui GitHub dengan:
- Commit yang jelas
- Branch feature yang terorganisir
- Pull request untuk review

## Lisensi

Project ini dibuat untuk keperluan pembelajaran.

---

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
