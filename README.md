## Fitur Utama

- Login multi-role: pendaftaran, dokter, perawat, apoteker
- CRUD pasien & kunjungan
- Pengisian vital sign oleh perawat
- Diagnosa & resep obat oleh dokter
- CRUD data obat oleh apoteker
- Halaman detail pasien berisi seluruh informasi pemeriksaan

---

## Requirement

- PHP >= 8.1
- Composer
- MySQL (XAMPP atau lainnya)
- Node.js & npm (untuk frontend)

---

## Cara Instalasi

1. **Clone Repository**

```bash
git clone https://github.com/krisnayogantaraa/Klinik.git
cd laravel-klinik
```

2. **Install Dependency**

```bash
composer install
npm install && npm run dev
```

3. **Copy .env & Generate Key**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Setup Database**

Buat database baru di MySQL (misal: `klinik_db`), lalu atur konfigurasi di file `.env`:

```env
DB_DATABASE=klinik_db
DB_USERNAME=root
DB_PASSWORD=
```

5. **Migrasi & Seeder**

```bash
php artisan migrate --seed
```

Seeder akan mengisi:
- Role pengguna
- Akun pengguna per role
- Data dummy pasien, kunjungan, checkup, diagnosis, resep
- Data obat

---

## Akun Login (Seeder)

| Role        | Email                        | Password |
| ----------- | ---------------------------- | -------- |
| Pendaftaran | pendaftaran@klinik.com       | password |
| Perawat     | perawat@klinik.com           | password |
| Dokter      | dokter@klinik.com            | password |
| Apoteker    | apoteker@klinik.com          | password |

---

## Struktur Fitur

- `routes/web.php` → Routing per role
- `app/Http/Controllers/*` → Controller per role
- `resources/views/*` → Blade templates dashboard & detail pasien
- `database/seeders/*` → Seeder data awal

---

## Catatan

- Sistem role: [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission)
- Frontend: Blade, Tailwind CSS, Flowbite, Heroicons

---

## Lisensi

Bebas digunakan untuk pembelajaran atau pengembangan lanjutan.
