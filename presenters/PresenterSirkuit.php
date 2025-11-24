<?php

// Include semua dependensi yang dibutuhkan
include_once("KontrakPresenterSirkuit.php");
include_once(__DIR__ . "/../models/TabelSirkuit.php");
include_once(__DIR__ . "/../models/Sirkuit.php");
include_once(__DIR__ . "/../views/ViewSirkuit.php");

// Class Presenter mengimplementasikan kontrak
class PresenterSirkuit implements KontrakPresenterSirkuit
{
    private $tabelSirkuit; // Instance Model
    private $viewSirkuit;  // Instance View

    // Constructor menerima Model dan View (Dependency Injection)
    public function __construct($tabelSirkuit, $viewSirkuit)
    {
        $this->tabelSirkuit = $tabelSirkuit; // Simpan model ke properti
        $this->viewSirkuit = $viewSirkuit;   // Simpan view ke properti
    }

    // Logic menampilkan list sirkuit
    public function tampilkanSirkuit(): string
    {
        // 1. Minta data mentah ke Model
        $data = $this->tabelSirkuit->getAllSirkuit();
        
        // 2. Ubah data array murni menjadi Array of Objects (Sirkuit)
        $listSirkuit = [];
        foreach ($data as $row) {
            $listSirkuit[] = new Sirkuit(
                $row['id'],
                $row['nama'],
                $row['negara'],
                $row['panjang_km'],
                $row['tipe_lintasan']
            );
        }

        // 3. Serahkan objek ke View untuk dirender jadi HTML
        return $this->viewSirkuit->tampilSirkuit($listSirkuit);
    }

    // Logic menampilkan form
    public function tampilkanFormSirkuit($id = null): string
    {
        $data = null;
        if ($id) {
            // Jika ada ID, minta data spesifik ke Model (untuk Edit)
            $data = $this->tabelSirkuit->getSirkuitById($id);
        }
        // Serahkan data ke View (null jika Add, array jika Edit)
        return $this->viewSirkuit->tampilFormSirkuit($data);
    }

    // Logic Tambah Data
    public function tambahSirkuit($nama, $negara, $panjang, $tipe): void
    {
        // Validasi sederhana bisa ditaruh di sini
        // Perintah Model untuk insert data
        $this->tabelSirkuit->addSirkuit($nama, $negara, $panjang, $tipe);
    }

    // Logic Update Data
    public function ubahSirkuit($id, $nama, $negara, $panjang, $tipe): void
    {
        // Perintah Model untuk update data
        $this->tabelSirkuit->updateSirkuit($id, $nama, $negara, $panjang, $tipe);
    }

    // Logic Hapus Data
    public function hapusSirkuit($id): void
    {
        // Perintah Model untuk delete data
        $this->tabelSirkuit->deleteSirkuit($id);
    }
}
?>