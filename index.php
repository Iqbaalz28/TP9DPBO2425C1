<?php

// --- INCLUDE FILE-FILE UTAMA ---
include_once("models/DB.php");

// Include Modul Pembalap
include_once("models/TabelPembalap.php");
include_once("views/ViewPembalap.php");
include_once("presenters/PresenterPembalap.php");

// Include Modul Sirkuit
include_once("models/TabelSirkuit.php");
include_once("views/ViewSirkuit.php");
include_once("presenters/PresenterSirkuit.php");

// --- INISIALISASI KONEKSI ---
$dbHost = 'localhost'; $dbName = 'mvp_db'; $dbUser = 'root'; $dbPass = '';

// --- LOGIKA ROUTING SEDERHANA ---
// Cek navigasi, default ke 'pembalap' jika tidak ada
$nav = isset($_GET['nav']) ? $_GET['nav'] : 'pembalap';

if ($nav == 'sirkuit') {
    // === AREA SIRKUIT ===
    
    // Instansiasi MVP Sirkuit
    $model = new TabelSirkuit($dbHost, $dbName, $dbUser, $dbPass);
    $view = new ViewSirkuit();
    $presenter = new PresenterSirkuit($model, $view);

    // Handle Action POST (Simpan/Hapus)
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add') {
            $presenter->tambahSirkuit($_POST['nama'], $_POST['negara'], $_POST['panjang'], $_POST['tipe']);
        } elseif ($_POST['action'] == 'edit') {
            $presenter->ubahSirkuit($_POST['id'], $_POST['nama'], $_POST['negara'], $_POST['panjang'], $_POST['tipe']);
        } elseif ($_POST['action'] == 'delete') {
            $presenter->hapusSirkuit($_POST['id']);
        }
        header("Location: index.php?nav=sirkuit"); // Redirect balik ke list sirkuit
        exit();
    }

    // Handle Tampilan GET
    if (isset($_GET['screen']) && $_GET['screen'] == 'add') {
        echo $presenter->tampilkanFormSirkuit(); // Form Tambah
    } elseif (isset($_GET['screen']) && $_GET['screen'] == 'edit') {
        echo $presenter->tampilkanFormSirkuit($_GET['id']); // Form Edit
    } else {
        // Tampilkan Navigasi Atas (Opsional biar gampang pindah)
        echo '<div style="padding:10px; background:#eee; text-align:center;">
                <a href="index.php?nav=pembalap">Menu Pembalap</a> | 
                <b>Menu Sirkuit</b>
              </div>';
        echo $presenter->tampilkanSirkuit(); // List Data
    }

} else {
    // === AREA PEMBALAP ===
    
    $model = new TabelPembalap($dbHost, $dbName, $dbUser, $dbPass);
    $view = new ViewPembalap();
    $presenter = new PresenterPembalap($model, $view);

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add') {
            $presenter->tambahPembalap($_POST['nama'], $_POST['tim'], $_POST['negara'], $_POST['poinMusim'], $_POST['jumlahMenang']);
        } elseif ($_POST['action'] == 'edit') {
            $presenter->ubahPembalap($_POST['id'], $_POST['nama'], $_POST['tim'], $_POST['negara'], $_POST['poinMusim'], $_POST['jumlahMenang']);
        } elseif ($_POST['action'] == 'delete') {
            $presenter->hapusPembalap($_POST['id']);
        }
        header("Location: index.php");
        exit();
    }

    if (isset($_GET['screen']) && $_GET['screen'] == 'add') {
        echo $presenter->tampilkanFormPembalap();
    } elseif (isset($_GET['screen']) && $_GET['screen'] == 'edit') {
        echo $presenter->tampilkanFormPembalap($_GET['id']);
    } else {
        // Navigasi
        echo '<div style="padding:10px; background:#eee; text-align:center;">
                <b>Menu Pembalap</b> | 
                <a href="index.php?nav=sirkuit">Menu Sirkuit</a>
              </div>';
        echo $presenter->tampilkanPembalap();
    }
}
?>