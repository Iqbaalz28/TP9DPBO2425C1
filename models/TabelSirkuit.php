<?php

// Include file koneksi DB
include_once("models/DB.php");
// Include kontrak agar class ini patuh pada aturan
include_once("models/KontrakModelSirkuit.php");

// Class TabelSirkuit mewarisi DB dan mengimplementasikan kontrak
class TabelSirkuit extends DB implements KontrakModelSirkuit
{
    // Constructor menerima konfigurasi DB dan oper ke parent (DB Class)
    public function __construct($host, $db_name, $username, $password)
    {
        parent::__construct($host, $db_name, $username, $password);
    }

    // Implementasi ambil semua data
    public function getAllSirkuit(): array
    {
        $query = "SELECT * FROM sirkuit"; // Query SQL select all
        $this->executeQuery($query);      // Jalankan query pakai method di DB.php
        return $this->getAllResult();     // Kembalikan hasil sebagai array
    }

    // Implementasi ambil satu data by ID
    public function getSirkuitById($id): ?array
    {
        $query = "SELECT * FROM sirkuit WHERE id = ?"; // Query select by id
        $this->executeQuery($query, [$id]);            // Jalankan dengan parameter binding
        $result = $this->getAllResult();               // Ambil hasil
        return !empty($result) ? $result[0] : null;    // Jika ada return array pertama, jika tidak null
    }

    // Implementasi tambah data
    public function addSirkuit($nama, $negara, $panjang, $tipe): void
    {
        // Query Insert
        $query = "INSERT INTO sirkuit (nama, negara, panjang_km, tipe_lintasan) VALUES (?, ?, ?, ?)";
        // Eksekusi dengan data yang dikirim dari presenter
        $this->executeQuery($query, [$nama, $negara, $panjang, $tipe]);
    }

    // Implementasi update data
    public function updateSirkuit($id, $nama, $negara, $panjang, $tipe): void
    {
        // Query Update berdasarkan ID
        $query = "UPDATE sirkuit SET nama = ?, negara = ?, panjang_km = ?, tipe_lintasan = ? WHERE id = ?";
        // Eksekusi update
        $this->executeQuery($query, [$nama, $negara, $panjang, $tipe, $id]);
    }

    // Implementasi hapus data
    public function deleteSirkuit($id): void
    {
        $query = "DELETE FROM sirkuit WHERE id = ?"; // Query Delete
        $this->executeQuery($query, [$id]);          // Eksekusi delete
    }
}
?>