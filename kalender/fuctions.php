<?php
function getHariIndonesia() {
    return ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
}

function getNamaBulan($bulan) {
    $namaBulan = [
        1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    return $namaBulan[$bulan];
}
