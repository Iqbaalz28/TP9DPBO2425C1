<?php

// Include kontrak view agar sesuai standar MVP
include_once("KontrakViewSirkuit.php");
// Include objek Sirkuit karena view akan menerima list objek ini dari Presenter
include_once("models/Sirkuit.php");

class ViewSirkuit implements KontrakViewSirkuit
{
    // Constructor kosong
    public function __construct() {}

    /**
     * Menampilkan Daftar Sirkuit (Tabel)
     * Menggunakan template/sirkuit_skin.html
     */
    public function tampilSirkuit($listSirkuit): string
    {
        $tbody = ''; // Penampung baris HTML
        $no = 1;     // Nomor urut

        // Looping data objek sirkuit dari presenter
        foreach ($listSirkuit as $sirkuit) {
            $tbody .= '<tr>';
            $tbody .= '<td class="col-id">' . $no . '</td>';
            $tbody .= '<td>' . htmlspecialchars($sirkuit->getNama()) . '</td>';
            $tbody .= '<td>' . htmlspecialchars($sirkuit->getNegara()) . '</td>';
            $tbody .= '<td>' . htmlspecialchars($sirkuit->getPanjang()) . '</td>';
            $tbody .= '<td>' . htmlspecialchars($sirkuit->getTipe()) . '</td>';
            // Tombol Aksi (Link mengarah ke nav=sirkuit)
            $tbody .= '<td class="col-actions">
                        <a href="index.php?nav=sirkuit&screen=edit&id=' . $sirkuit->getId() . '" class="btn btn-edit">Edit</a>
                        <button data-id="' . $sirkuit->getId() . '" class="btn btn-delete">Hapus</button>
                       </td>';
            $tbody .= '</tr>';
            $no++;
        }

        // 1. Ambil template skin khusus sirkuit
        $templatePath = __DIR__ . '/../template/sirkuit_skin.html';
        
        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);
        } else {
            // Fallback jika file tidak ada
            return "Error: Template sirkuit_skin.html tidak ditemukan.";
        }
        
        // 2. Inject baris tabel ke dalam template
        $template = str_replace('<!-- PHP will inject rows here -->', $tbody, $template);
        
        // 3. Update informasi total data
        $total = count($listSirkuit);
        $template = str_replace('Total:', 'Total: ' . $total, $template);
        
        return $template;
    }

    /**
     * Menampilkan Form Tambah/Edit
     * Menggunakan template/sirkuit_form.html
     */
    public function tampilFormSirkuit($data = null): string
    {
        // 1. Ambil template form
        $templatePath = __DIR__ . '/../template/sirkuit_form.html';
        
        if (!file_exists($templatePath)) {
            return "Error: File template/sirkuit_form.html tidak ditemukan!";
        }
        
        $template = file_get_contents($templatePath);
        
        // 2. Siapkan nilai default (Kosong untuk 'Add', Terisi untuk 'Edit')
        if ($data != null) {
            // Mode EDIT
            $valAction = 'edit';
            $valId     = $data['id'];
            $valNama   = htmlspecialchars($data['nama']);
            $valNegara = htmlspecialchars($data['negara']);
            $valPanjang = htmlspecialchars($data['panjang_km']); // Sesuai nama kolom di DB
            $valTipe   = htmlspecialchars($data['tipe_lintasan']); // Sesuai nama kolom di DB
        } else {
            // Mode ADD
            $valAction = 'add';
            $valId     = '';
            $valNama   = '';
            $valNegara = '';
            $valPanjang = '';
            $valTipe   = '';
        }

        // 3. Replace Placeholder (HURUF_KAPITAL) di HTML dengan nilai data
        $template = str_replace('ACTION_VAL', $valAction, $template);
        $template = str_replace('ID_VAL', $valId, $template);
        $template = str_replace('NAMA_VAL', $valNama, $template);
        $template = str_replace('NEGARA_VAL', $valNegara, $template);
        $template = str_replace('PANJANG_VAL', $valPanjang, $template);
        $template = str_replace('TIPE_VAL', $valTipe, $template);

        return $template;
    }
}
?>