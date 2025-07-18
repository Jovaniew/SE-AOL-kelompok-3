<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../koneksi.php';

if (!isset($_SESSION['admin']) && !isset($_SESSION['pemilik'])) {
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:../login.php');
    exit();
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Konsul bodyguard</title>
    <link href="css/css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/css//sb-admin-2.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="assets/ckeditor/ckeditor.js"></script>
</head>


<?php
if ($_SESSION['admin']['level'] == 'Admin') {
    $bg = "bg-ungu";
} elseif ($_SESSION['admin']['level'] == 'bodyguard') {
    $bg = "bg-ungu";
}
?>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav <?= $bg ?> sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?halaman=beranda">

                <div class="sidebar-brand-text mx-3">
                    <span>Konsultasi bodyguard</span>
                </div>
            </a>
            <hr class="sidebar-divider">
            <?php
            if ($_SESSION['admin']['level'] == 'Admin') {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=beranda">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=jasabodyguard">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Jasa Bodyguard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=bodyguard">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Bodyguard</span>
                </a>
            </li>
            <?php
            } else if ($_SESSION['admin']['level'] == 'bodyguard') { ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=beranda">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=booking">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Transaksi</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=klien">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Klien</span>
                </a>
            </li>

            <?php
            }
            ?>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?');" class="nav-link"
                                href="index.php?halaman=logout">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Keluar</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div id="page-inner">
                        <?php
                        if (isset($_GET['halaman'])) {
                            if ($_GET['halaman'] == "bodyguard") {
                                include 'bodyguard.php';
                            } elseif ($_GET['halaman'] == "booking") {
                                include 'booking.php';
                            } elseif ($_GET['halaman'] == "pengguna") {
                                include 'pengguna.php';
                            } elseif ($_GET['halaman'] == "klien") {
                                include 'klien.php';
                            } elseif ($_GET['halaman'] == "detail") {
                                include 'detail.php';
                            } elseif ($_GET['halaman'] == "tambahbodyguard") {
                                include 'tambahbodyguard.php';
                            } elseif ($_GET['halaman'] == "hapusbodyguard") {
                                include 'hapusbodyguard.php';
                            } elseif ($_GET['halaman'] == "ubahbodyguard") {
                                include 'ubahbodyguard.php';
                            } elseif ($_GET['halaman'] == "logout") {
                                include 'logout.php';
                            } elseif ($_GET['halaman'] == "detailbooking") {
                                include 'detailbooking.php';
                            } elseif ($_GET['halaman'] == "kategori") {
                                include 'kategori.php';
                            } elseif ($_GET['halaman'] == "ubahkategori") {
                                include 'ubahkategori.php';
                            } elseif ($_GET['halaman'] == "detailproduk") {
                                include 'detailproduk.php';
                            } elseif ($_GET['halaman'] == "tambahkategori") {
                                include 'tambahkategori.php';
                            } elseif ($_GET['halaman'] == "hapuskategori") {
                                include 'hapuskategori.php';
                            } elseif ($_GET['halaman'] == "hapuspengguna") {
                                include 'hapuspengguna.php';
                            } elseif ($_GET['halaman'] == "beranda") {
                                include 'beranda.php';
                            } elseif ($_GET['halaman'] == "laporan") {
                                include 'laporan.php';
                            } elseif ($_GET['halaman'] == "konsultasi") {
                                include 'konsultasi.php';
                            } elseif ($_GET['halaman'] == "jasabodyguard") {
                                include 'jasabodyguard.php';
                            } elseif ($_GET['halaman'] == "tambahjasabodyguard") {
                                include 'tambahjasabodyguard.php';
                            } elseif ($_GET['halaman'] == "ubahjasabodyguard") {
                                include 'ubahjasabodyguard.php';
                            } elseif ($_GET['halaman'] == "hapusjasabodyguard") {
                                include 'hapusjasabodyguard.php';
                            }
                        } else {
                            include 'beranda.php';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <script src="js/sb-admin-2.min.js"></script>
            <script src="css/js/sb-admin-2.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/jquery.metisMenu.js"></script>
            <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
            <script src="assets/js/morris/morris.js"></script>
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/bootstrap.bundle.min.js"></script>
            <script src="assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
            <script src="assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
            <script src="assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>
            <script src="assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
            <script src="assets/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
            <script src="assets/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
            <script src="assets/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>
            <script src="assets/DataTables/Buttons-1.5.6/js/buttons.colvis.min.js"></script>


            <script>
            $(document).ready(function() {
                var table = $('#table').DataTable({
                    buttons: ['csv', 'print', 'excel', 'pdf'],
                    dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                        "<'row'<'col-md-12'tr>>" +
                        "<'row'<'col-md-5'i><'col-md-7'p>>",
                    lengthMenu: [
                        [5, 10, 25, 50, 100, -1],
                        [5, 10, 25, 50, 100, "ALL"]
                    ]
                });

                table.buttons().container()
                    .appendTo('#table_wrapper .col-md-5:eq(0)');
            });
            </script>
</body>

</html>