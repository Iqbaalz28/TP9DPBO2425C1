<?php

// Mendefinisikan interface untuk View Sirkuit
interface KontrakViewSirkuit
{
    // Memaksa view untuk bisa menampilkan tabel daftar sirkuit
    public function tampilSirkuit($listSirkuit): string;

    // Memaksa view untuk bisa menampilkan form tambah/edit sirkuit
    public function tampilFormSirkuit($data = null): string;
}

?>