# CI-CMS — Simulasi Pembelian Produk (CodeIgniter 4)

CMS sederhana tanpa fitur login/register. Fokus pada implementasi CRUD (Create,
Read, Update, Delete) untuk mengelola **Produk** dan mensimulasikan **Pembelian**
(stok berkurang saat "dibeli", dan bisa dibatalkan/diedit).

## Tech Stack
- Framework: **CodeIgniter 4**
- Database: Migration bawaan CodeIgniter (`php spark migrate`)
- Server dev: `php spark serve`
- UI: HTML + CSS murni, palet 3 warna flat (tanpa gradasi)

## Struktur Fitur
- **Products** — CRUD penuh (tambah, lihat, edit, hapus produk + stok & harga)
- **Purchases** — Simulasi proses pembelian:
  - Create: pilih produk, isi nama pembeli & qty → stok produk otomatis berkurang
  - Read: riwayat transaksi pembelian
  - Update: ubah qty/nama pembeli → stok disesuaikan otomatis
  - Delete: batalkan transaksi → stok dikembalikan ke produk

## Cara Integrasi ke Repo Lokal `ci-cms-ws`

### 1. Pastikan skeleton CodeIgniter 4 sudah ada
Jika folder `ci-cms-ws` masih kosong / belum berisi project CI4, install dulu:

```bash
composer create-project codeigniter4/appstarter ci-cms-ws
```

Jika sudah ada project CI4 di dalamnya, lewati langkah ini.

### 2. Salin file dari paket ini ke repo
Salin/replace folder & file berikut ke dalam `ci-cms-ws/`:

```
app/Controllers/Home.php
app/Controllers/Products.php
app/Controllers/Purchases.php
app/Models/ProductModel.php
app/Models/PurchaseModel.php
app/Database/Migrations/2026-09-09-100001_CreateProducts.php
app/Database/Migrations/2026-09-09-100002_CreatePurchases.php
app/Database/Seeds/ProductSeeder.php
app/Views/templates/header.php
app/Views/templates/footer.php
app/Views/home/index.php
app/Views/products/index.php
app/Views/products/create.php
app/Views/products/edit.php
app/Views/purchases/index.php
app/Views/purchases/create.php
app/Views/purchases/edit.php
app/Config/Routes.php   (replace bagian routing, atau merge manual)
public/assets/css/style.css
```

### 3. Konfigurasi Database
Copy `.env.example` menjadi `.env` (jika belum ada), lalu set:

```
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = ci_cms_ws
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

Buat database kosong `ci_cms_ws` di MySQL/MariaDB terlebih dahulu.

### 4. Jalankan Migration

```bash
cd ci-cms-ws
php spark migrate
```

### 5. (Opsional) Isi data contoh

```bash
php spark db:seed ProductSeeder
```

### 6. Jalankan server

```bash
php spark serve
```

Akses di browser: `http://localhost:8080`

## Palet Warna (3 Warna)
| Nama            | Hex       | Fungsi                              |
|-----------------|-----------|--------------------------------------|
| Dark Slate      | `#22333B` | Navbar, teks, tombol primary        |
| Light Off-White | `#F2F4F3` | Background halaman & form           |
| Warm Tan        | `#C6AC8F` | Aksen tombol (mis. hapus/batal)     |

Tidak ada gradasi — semua elemen menggunakan warna solid/flat.

## Commit ke GitHub
Setelah file disalin & diuji jalan lokal:

```bash
git add .
git commit -m "feat: implement product CRUD & purchase simulation with CI4 migrations"
git push origin main
```
