<?php

// Definisi Class Sirkuit sebagai representasi objek
class Sirkuit
{
    // Properti private untuk enkapsulasi data
    private $id;
    private $nama;
    private $negara;
    private $panjang;
    private $tipe;

    // Constructor untuk mengisi data saat objek dibuat
    public function __construct($id, $nama, $negara, $panjang, $tipe)
    {
        $this->id = $id;           // Set id
        $this->nama = $nama;       // Set nama
        $this->negara = $negara;   // Set negara
        $this->panjang = $panjang; // Set panjang
        $this->tipe = $tipe;       // Set tipe
    }

    // Getter untuk mengambil ID
    public function getId() { return $this->id; }
    
    // Getter untuk mengambil Nama
    public function getNama() { return $this->nama; }
    
    // Getter untuk mengambil Negara
    public function getNegara() { return $this->negara; }
    
    // Getter untuk mengambil Panjang
    public function getPanjang() { return $this->panjang; }
    
    // Getter untuk mengambil Tipe
    public function getTipe() { return $this->tipe; }
}
?>