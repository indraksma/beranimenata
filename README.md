# BERANI MENATA - Peta Arah Masa Depan

Website edukasi interaktif untuk membantu remaja menyusun rencana masa depan yang lebih terarah. Aplikasi ini mengajak pengguna memetakan tujuan pendidikan, cita-cita, keterampilan, dan komitmen pribadi sebagai pendekatan positif untuk mendukung Pendewasaan Usia Perkawinan (PUP).

Proyek ini dikembangkan dengan Laravel, Livewire, Tailwind CSS, dan Docker agar mudah dijalankan secara lokal.

## Fitur Utama

- Beranda informatif dengan pesan utama program BERANI MENATA.
- Form multi-step "Peta Arah Masa Depan" untuk mengisi data diri, cita-cita, target pendidikan, keterampilan, dan komitmen.
- Kartu ringkasan hasil setelah pengguna menyimpan peta masa depan.
- Halaman "Sudut Edukasi" berisi materi tentang perencanaan masa depan, PUP, dampak pernikahan dini, dan tips meraih cita-cita.
- Login admin sederhana.
- Dashboard admin untuk melihat jumlah peta masa depan, komitmen, cita-cita terpopuler, tren submission, dan tabel data pengguna.

## Stack Teknologi

- PHP 8.3
- Laravel 13
- Livewire 4
- MySQL 8
- Tailwind CSS 4
- Vite
- Nginx
- Docker Compose

## Struktur Proyek

```text
.
├── docker/                 # Konfigurasi Nginx dan PHP
├── src/                    # Source code Laravel
│   ├── app/Livewire/       # Komponen halaman utama
│   ├── database/           # Migration, factory, seeder
│   ├── resources/          # Blade views, CSS, JS
│   ├── routes/web.php      # Route aplikasi
│   └── tests/              # Feature dan unit tests
├── docker-compose.yml      # Service app, nginx, mysql, phpMyAdmin
├── .env.compose            # Konfigurasi image PHP untuk Docker Compose
└── README.md
```

## Halaman Aplikasi

| Route | Deskripsi |
| --- | --- |
| `/` | Beranda program BERANI MENATA |
| `/peta-masa-depan` | Form multi-step peta masa depan |
| `/edukasi` | Materi edukasi remaja |
| `/login` | Login admin |
| `/admin` | Dashboard admin, wajib login |

## Menjalankan Proyek

Pastikan Docker dan Docker Compose sudah tersedia.

1. Jalankan container dari root repository:

```bash
docker compose --env-file .env.compose up -d
```

2. Install dependency Laravel:

```bash
docker compose --env-file .env.compose exec app composer install
```

3. Siapkan file environment Laravel:

```bash
docker compose --env-file .env.compose exec app cp .env.example .env
docker compose --env-file .env.compose exec app php artisan key:generate
```

4. Pastikan konfigurasi database di `src/.env` sesuai service Docker:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=app
DB_USERNAME=app
DB_PASSWORD=app
```

5. Jalankan migration dan seeder admin:

```bash
docker compose --env-file .env.compose exec app php artisan migrate --seed
```

6. Install dan build asset frontend dari folder `src/`:

```bash
cd src
npm install
npm run build
```

7. Buka aplikasi:

- Website: `http://localhost:8080`
- phpMyAdmin: `http://localhost:8081`

## Akun Admin

Seeder membuat akun admin default:

```text
Email: admin@beranimenata.local
Password: ganti-password-ini
```

Ubah password default sebelum aplikasi digunakan di lingkungan selain lokal.

## Perintah Pengembangan

Menjalankan Vite saat pengembangan:

```bash
cd src
npm run dev
```

Menjalankan test Laravel:

```bash
docker compose --env-file .env.compose exec app php artisan test
```

Menjalankan test tertentu:

```bash
docker compose --env-file .env.compose exec app php artisan test --filter=FutureMapFormTest
```

Format kode PHP dengan Pint:

```bash
docker compose --env-file .env.compose exec app vendor/bin/pint
```

## Port Lokal

| Service | URL/Port |
| --- | --- |
| Nginx | `http://localhost:8080` |
| phpMyAdmin | `http://localhost:8081` |
| MySQL host port | `33060` |

Jika port bentrok dengan proyek lain, ubah mapping port pada `docker-compose.yml`.

## Catatan Deployment

- Jangan gunakan kredensial admin default di production.
- Set `APP_ENV=production`, `APP_DEBUG=false`, dan `APP_URL` sesuai domain.
- Jalankan `npm run build` sebelum deploy.
- Jalankan migration pada server production dengan hati-hati:

```bash
php artisan migrate --force
```

## Lisensi

Proyek ini dibuat untuk kebutuhan pengembangan website edukasi BERANI MENATA. Sesuaikan bagian lisensi ini dengan kebijakan repository sebelum dipublikasikan.
