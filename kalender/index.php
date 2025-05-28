<?php
include 'functions.php';

// Ambil parameter bulan dan tahun, jika tidak ada pakai sekarang
$bulan = isset($_GET['bulan']) ? (int)$_GET['bulan'] : date('n');
$tahun = isset($_GET['tahun']) ? (int)$_GET['tahun'] : date('Y');
$tanggalHariIni = date('j');
$bulanSekarang = date('n');
$tahunSekarang = date('Y');

// Hitung navigasi bulan sebelumnya dan sesudahnya
$prevBulan = $bulan - 1;
$nextBulan = $bulan + 1;
$prevTahun = $tahun;
$nextTahun = $tahun;

if ($prevBulan < 1) {
    $prevBulan = 12;
    $prevTahun--;
}
if ($nextBulan > 12) {
    $nextBulan = 1;
    $nextTahun++;
}

$namaBulan = getNamaBulan($bulan);
$hari = getHariIndonesia();
$jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
$awalBulan = date('w', mktime(0, 0, 0, $bulan, 1, $tahun)); // 0=minggu

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalender Dinamis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="canvas">
        <div class="nav">
            <a href="?bulan=<?= $prevBulan ?>&tahun=<?= $prevTahun ?>">&lt;&lt; Bulan Sebelumnya</a>
            <span><?= $namaBulan . ' ' . $tahun ?></span>
            <a href="?bulan=<?= $nextBulan ?>&tahun=<?= $nextTahun ?>">Bulan Berikutnya &gt;&gt;</a>
        </div>
        <table>
            <tr>
                <?php foreach ($hari as $h) : ?>
                    <th><?= $h ?></th>
                <?php endforeach; ?>
            </tr>
            <tr>
                <?php
                $hariKe = 0;
                for ($i = 0; $i < $awalBulan; $i++) {
                    echo "<td></td>";
                    $hariKe++;
                }

                for ($tanggal = 1; $tanggal <= $jumlahHari; $tanggal++) {
                    $class = '';
                    if ($tanggal == $tanggalHariIni) {
                        $class = 'today'; // warnai semua tanggal seperti hari ini
                    }

                    echo "<td class=\"$class\">$tanggal</td>";
                    $hariKe++;

                    if ($hariKe % 7 == 0) {
                        echo "</tr><tr>";
                    }
                }

                while ($hariKe % 7 != 0) {
                    echo "<td></td>";
                    $hariKe++;
                }
                ?>
            </tr>
        </table>
    </div>
</body>
</html>
