# 🔗 Pranala Cekak (private URL Shortener)

[![License: GPLv3](https://shields.io)](https://opensource.org)
[![Build Status](https://shields.io)]()

Pranala Cekak adalah aplikasi web *open-source* untuk memperpendek tautan (URL -_Uniform Resource Locator_) yang panjang menjadi tautan singkat yang rapi, mudah diingat, dan mudah dibagikan. Aplikasi ini dibangun dengan fokus pada kecepatan, keamanan, dan kemudahan penggunaan. Penggunaan tautan pendek dengan menggunakan domain organisasi kita (bukan _public URL shortener_), maka kepercayaan dan bonafiditas organisasi di mata pengguna Internet dapat dijaga.

## 🚀 Fitur Utama

- **Pemendekan Instan:** Ubah tautan panjang apa pun dalam hitungan detik.
- **Kustomisasi Tautan:** Buat alias khusus (contoh: `https://s.domain.com`).
- **Otomasi Ketersediaan Tautan:** Tautan dapat dijadwalkan ketersediaannya berdasarkan waktu atau pun jumlah aksesnya.
- **Statistik Klik:** Lacak jumlah klik, lokasi, dan referer untuk setiap tautan.
- **QR Code Generator:** Otomatis menghasilkan QR Code untuk setiap link.
- **Self-Hosted:** Jalankan di server Anda sendiri untuk kontrol data penuh.

## 🛠️ Teknologi yang Digunakan

*   **Backend:** PHP + Laravel
*   **Database:** MySQL atau MariaDB
*   **Frontend:** HTML5 + CSS3 + JavaScript + Bootstrap

## 📥 Instalasi dan Konfigurasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi secara lokal.

### Prasyarat
- PHP
- MySQL atau MariaDB

### Langkah-langkah
1.  **Clone repositori:**
    ```bash
    git clone https://github.com
    cd pranala-cekak
    ```
2.  **Instal dependensi:**
    ```bash
    # Contoh jika menggunakan npm
    npm install
    ```
3.  **Konfigurasi file `.env`:**
    Salin file `.env.example` menjadi `.env` dan atur konfigurasi database serta API Key.
    ```bash
    cp .env.example .env
    ```
4.  **Jalankan Migrasi Database:**
    ```bash
    # Contoh untuk Laravel
    php artisan migrate
    ```
5.  **Jalankan Aplikasi:**
    ```bash
    npm start
    ```

## 🖥️ Cara Penggunaan

1.  Buka aplikasi di peramban (`http://localhost:3000`).
2.  Tempelkan URL panjang pada kolom input yang tersedia.
3.  (Opsional) Masukkan teks kustom untuk alias link.
4.  Klik tombol **"Shorten"** atau **"Persingkat"**.
5.  Salin link pendek yang dihasilkan dan bagikan!

## 🙏 Terima Kasih

Proyek ini pertama kali berjalan, sebagai bagian penelitian **Automatic Plant Acclimitation Chamber (APAC)** atas pendanaan dari SIMLITABMAS -sekarang BIMA, Kemenristekdikti (Kementerian Riset, Teknologi, dan Pendidikan Tinggi). Kemudian proyek ini dilanjutkan dengan biaya mandiri dan dibantu oleh beberapa pihak dari:

1. **PT Radnet Digital Indonesia**: Terima kasih atas peminjaman servernya di data center -termasuk bandwidth-nya.
2. **GitHub, Inc.**: Terima kasih atas perkenannya menggunakan repository ini.
3. **Semua Kontributor OpenSource**: Terima kasih atas kesediaan mengorbankan waktu dan pengetahuannya, sehingga aplikasi ini bisa dibuat dengan mudah dan tanpa perlu biaya pengembangan yang besar.
4. **Semua Mahasiswaku**: Yang telah ikut membantu


## 🤝 Kontribusi

Kami sangat menyambut kontribusi dari komunitas! Silakan buka *issue* atau kirim *pull request* untuk perbaikan, penambahan fitur, atau dokumentasi.

## 📜 Lisensi

Proyek ini dilisensikan di bawah lisensi [GPLv3](LICENSE).

---
*Dibuat dengan ❤️ untuk kemudahan berbagi link.*

