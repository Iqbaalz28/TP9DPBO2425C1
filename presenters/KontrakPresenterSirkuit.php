<?php

// Mendefinisikan interface untuk Presenter Sirkuit
interface KontrakPresenterSirkuit
{
    // Kontrak untuk menampilkan halaman list
    public function tampilkanSirkuit(): string;

    // Kontrak untuk menampilkan halaman form
    public function tampilkanFormSirkuit($id = null): string;

    // Kontrak untuk logika menambah data
    public function tambahSirkuit($nama, $negara, $panjang, $tipe): void;

    // Kontrak untuk logika mengubah data
    public function ubahSirkuit($id, $nama, $negara, $panjang, $tipe): void;

    // Kontrak untuk logika menghapus data
    public function hapusSirkuit($id): void;
}

?>