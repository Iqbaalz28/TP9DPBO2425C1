# TP9DPBO2425C1
Proyek ini adalah aplikasi web sederhana untuk mengelola data **Pembalap** dan **Sirkuit**. Aplikasi ini dibangun menggunakan bahasa pemrograman **PHP Native** dengan menerapkan pola arsitektur perangkat lunak **Model-View-Presenter (MVP)**. Tujuan utama proyek ini adalah mendemonstrasikan pemisahan tanggung jawab (*Separation of Concerns*) antara logika bisnis, manipulasi data, dan tampilan antarmuka, serta penggunaan **Interface (Kontrak)** untuk menjaga konsistensi kode.

## 🙏🏻 Janji
Saya Iqbal Rizky Maulana dengan NIM 2408622 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## 🚀 Fitur Utama
### 1. Manajemen Pembalap
* **Create:** Menambahkan data pembalap baru.
* **Read:** Menampilkan daftar pembalap dalam tabel.
* **Update:** Mengedit data pembalap yang sudah ada.
* **Delete:** Menghapus data pembalap.

### 2. Manajemen Sirkuit
* **Create:** Menambahkan data sirkuit balapan baru (Nama, Negara, Panjang, Tipe).
* **Read:** Menampilkan daftar sirkuit.
* **Update:** Mengedit data sirkuit.
* **Delete:** Menghapus data sirkuit.

## 🏗️ Arsitektur & Konsep MVP
1.  **Model (`models/`)**:
    * Bertanggung jawab atas koneksi database dan manipulasi data.
    * Menggunakan **PDO** untuk keamanan database.
    * Merepresentasikan data sebagai Objek (Class `Pembalap` & `Sirkuit`).
2.  **View (`views/`)**:
    * Bersifat pasif (*Passive View*).
    * Hanya bertugas merender template HTML dan menempatkan data yang diberikan oleh Presenter.
    * Tidak memiliki akses langsung ke database.
    * Menggunakan file template terpisah di folder `template/`.
3.  **Presenter (`presenters/`)**:
    * Bertindak sebagai penghubung (*middleman*).
    * Mengambil data dari Model, memprosesnya, dan memerintahkan View untuk menampilkannya.
    * Menangani logika bisnis aplikasi.
4.  **Interface / Kontrak**:
    * Setiap komponen (Model, View, Presenter) mengimplementasikan **Interface** (`KontrakModel`, `KontrakView`, `KontrakPresenter`).
    * Ini memastikan *loose coupling* dan memudahkan pengujian (*testability*).

## 🗄️ Struktur Direktori
```
/
├── index.php                 # Entry Point & Routing
├── mvp_db.sql                # File Database MySQL
├── models/                   # Layer Data
│   ├── DB.php                # Koneksi Database Wrapper
│   ├── KontrakModel.php      # Interface Model
│   ├── TabelPembalap.php     # Implementasi Model Pembalap
│   ├── TabelSirkuit.php      # Implementasi Model Sirkuit
│   ├── Pembalap.php          # Entitas/Objek Pembalap
│   └── Sirkuit.php           # Entitas/Objek Sirkuit
├── presenters/               # Layer Logika
│   ├── KontrakPresenter.php  # Interface Presenter
│   ├── PresenterPembalap.php # Logic Pembalap
│   └── PresenterSirkuit.php  # Logic Sirkuit
├── views/                    # Layer Tampilan
│   ├── KontrakView.php       # Interface View
│   ├── ViewPembalap.php      # Renderer Pembalap
│   └── ViewSirkuit.php       # Renderer Sirkuit
└── template/                 # File HTML Mentah (Skin)
    ├── skin.html             # Template Tabel Pembalap
    ├── form.html             # Template Form Pembalap
    ├── sirkuit_skin.html     # Template Tabel Sirkuit
    └── sirkuit_form.html     # Template Form Sirkuit
```

## 🔄 Alur Kerja Program
<img width="1567" height="1627" alt="Flow Program TP9" src="https://github.com/user-attachments/assets/e770c6f8-3c6a-4412-8e52-f5bec60a1159" />

## 📸 Dokumentasi
