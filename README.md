<h1 align="center">🩺 Klinik App</h1>
<p align="center">
  <b>Aplikasi Klinik Sederhana</b><br>
  <i>Manajemen pasien, kunjungan, diagnosa, dan apotek</i>
</p>

---

## ✨ Fitur Utama

- 🔑 Login multi-role: pendaftaran, dokter, perawat, apoteker
- 👤 CRUD pasien & kunjungan
- 🩹 Pengisian vital sign oleh perawat
- 🩺 Diagnosa & 💊 resep obat oleh dokter
- 💊 CRUD data obat oleh apoteker
- 📋 Halaman detail pasien berisi seluruh informasi pemeriksaan

---

## ⚙️ Requirement

| Software   | Versi         |
|------------|---------------|
| PHP        | 8.3.14        |
| Composer   | Terbaru       |
| MySQL      | (XAMPP/other) |
| Node.js    | **v23.6.1**   |
| npm        | **v10.9.2**   |

> ⚠️ **Penting:**  
> **Versi Node.js dan npm harus persis seperti di atas** agar proses build tidak error.  
> Jika versi berbeda, `npm install` atau `npm run build` bisa gagal atau muncul error dependency.

---

## 🚀 Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/krisnayogantaraa/Klinik.git
cd klinik
```

### 2. Install Dependency

```bash
composer update
npm install
```

### 3. Jalankan Development/Build

```bash
npm run dev
# atau
npm run build
```

### 4. Copy .env & Generate Key

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Setup Database

Buat database baru di MySQL (misal: `klinik_db`), lalu atur konfigurasi di file `.env`:

```env
DB_DATABASE=klinik_db
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Migrasi & Seeder

Jika database **belum ada**:
```bash
php artisan migrate --seed
```
Jika database **sudah ada**:
```bash
php artisan migrate:fresh --seed
```

Seeder akan mengisi:
- 👥 Role pengguna
- 👤 Akun pengguna per role
- 🏥 Data dummy pasien, kunjungan, checkup, diagnosis, resep
- 💊 Data obat

### 7. Jalankan Server Lokal

```bash
php artisan serve
```

Akses aplikasi di browser melalui:  
[http://localhost:8000](http://localhost:8000)

---

## 🔐 Akun Login (Seeder)

| Role           | Email                      | Password |
|----------------|---------------------------|----------|
| 📝 Pendaftaran | pendaftaran@example.com    | password |
| 🧑‍⚕️ Perawat   | perawat@example.com        | password |
| 👨‍⚕️ Dokter    | dokter@example.com         | password |
| 💊 Apoteker    | apoteker@example.com       | password |

---

## 🗂️ Struktur Fitur

- `routes/web.php` → Routing per role
- `app/Http/Controllers/*` → Controller per role
- `resources/views/*` → Blade templates dashboard & detail pasien
- `database/seeders/*` → Seeder data awal

---

## 📝 Catatan

- Sistem role: [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission)
- Frontend: Blade, Tailwind CSS, Flowbite, Heroicons

---

## 📄 Lisensi

Bebas digunakan untuk pembelajaran atau pengembangan lanjutan.
