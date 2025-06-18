<?php
$bodyguard = $koneksi->query("SELECT * FROM bodyguard");
$jumlahbodyguard = $bodyguard->num_rows;

$member = $koneksi->query("SELECT * FROM pengguna WHERE level = 'Pelanggan'");
$jumlahmember = $member->num_rows;

$booking = $koneksi->query("SELECT * FROM booking");
$jumlahbooking = $booking->num_rows;

$tahunini = date('Y');
$bulanini = date('m');

$bulan = 1;
$penjualangrafik = array();
$bookinggrafik = array();
while ($bulan <= 12) {
    // Booking per bulan
    $bookingQuery = $koneksi->query("SELECT * FROM booking WHERE MONTH(tanggalbooking) = '$bulan' AND YEAR(tanggalbooking) = '$tahunini' AND statusbeli != 'Menunggu Konfirmasi Admin' AND statusbeli != 'Belum Bayar' AND statusbeli != 'Pesanan Di Tolak'");
    // Count the total number of bookings in this month
    $totalPenjualan = $bookingQuery->num_rows;  // Counting the rows in the query result
    $penjualangrafik[] = $totalPenjualan;
    $bulan++;
}
?>
<br>
<div class="row mb-3">
    <div class="col-md-12">
        <center>
            <img src="../foto/bodyguard.png" width="200px" height="200px;" style="border-radius: 10px">
        </center>
    </div>
</div>
<br>

<div class="row">
    <?php if ($_SESSION['admin']['level'] == "Admin") { ?>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah bodyguard</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahbodyguard ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="index.php?halaman=bodyguard" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah Member</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahmember ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="index.php?halaman=pengguna" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</div>