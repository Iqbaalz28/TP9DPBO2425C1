<?php

include_once(__DIR__ . "/KontrakPresenter.php");
include_once(__DIR__ . "/../models/TabelPembalap.php");
include_once(__DIR__ . "/../models/Pembalap.php");
include_once(__DIR__ . "/../views/ViewPembalap.php");

class PresenterPembalap implements KontrakPresenter
{
    private $tabelPembalap; // Instance dari TabelPembalap (Model)
    private $viewPembalap; // Instance dari ViewPembalap (View)
    private $listPembalap = []; // Menyimpan array objek Pembalap

    public function __construct($tabelPembalap, $viewPembalap)
    {
        $this->tabelPembalap = $tabelPembalap;
        $this->viewPembalap = $viewPembalap;
    }

    // Mengambil data dari DB dan mengubahnya menjadi Objek Pembalap
    public function initListPembalap()
    {
        $data = $this->tabelPembalap->getAllPembalap();
        $this->listPembalap = [];

        foreach ($data as $row) {
            $this->listPembalap[] = new Pembalap(
                $row['id'],
                $row['nama'],
                $row['tim'],
                $row['negara'],
                $row['poinMusim'],
                $row['jumlahMenang']
            );
        }
    }

    // Menampilkan daftar pembalap
    public function tampilkanPembalap(): string
    {
        $this->initListPembalap(); // Ambil data terbaru dulu
        return $this->viewPembalap->tampilPembalap($this->listPembalap);
    }

    // Menampilkan form (Create/Edit)
    public function tampilkanFormPembalap($id = null): string
    {
        $data = null;
        if ($id != null) {
            // Jika ada ID, berarti mode Edit. Ambil data lama.
            $data = $this->tabelPembalap->getPembalapById($id);
        }
        // Kirim data ke View (kalau null berarti form tambah, kalau ada isi berarti form edit)
        return $this->viewPembalap->tampilFormPembalap($data);
    }

    // --- Implementasi Logika Bisnis (CRUD) ---
    public function tambahPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang): void
    {
        $this->tabelPembalap->addPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang);
    }

    public function ubahPembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang): void
    {
        $this->tabelPembalap->updatePembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang);
    }

    public function hapusPembalap($id): void
    {
        $this->tabelPembalap->deletePembalap($id);
    }
}
?>