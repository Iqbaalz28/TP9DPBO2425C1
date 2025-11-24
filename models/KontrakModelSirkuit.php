<?php

// Mendefinisikan interface untuk Model Sirkuit
interface KontrakModelSirkuit
{
    // Memaksa model untuk punya fungsi ambil semua data sirkuit
    public function getAllSirkuit(): array;

    // Memaksa model untuk punya fungsi ambil satu sirkuit by ID
    public function getSirkuitById($id): ?array;

    // Memaksa model untuk punya fungsi tambah sirkuit
    public function addSirkuit($nama, $negara, $panjang, $tipe): void;

    // Memaksa model untuk punya fungsi update sirkuit
    public function updateSirkuit($id, $nama, $negara, $panjang, $tipe): void;

    // Memaksa model untuk punya fungsi hapus sirkuit
    public function deleteSirkuit($id): void;
}

?>