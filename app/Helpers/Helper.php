<?php

use App\Models\Anggota;

if (!function_exists('get_code')) {
    function get_code($arrayOrg)
    {
        // Menghilangkan angka 0 di depan jika ada
        $dataTanpaNolDepan = ltrim($arrayOrg, '0');

        // Menambahkan kembali 0 di depan jika panjang string kurang dari 2
        $dataHasil = str_pad($dataTanpaNolDepan, 2, '0', STR_PAD_LEFT);

        // Mendapatkan nomor tertinggi yang sudah ada di database
        $nomorTerakhir = Anggota::max('id'); // Gantilah 'nomor' dengan nama kolom yang sesuai

        // Mengambil nomor berikutnya
        $nomor = $nomorTerakhir ? $nomorTerakhir + 1 : 1;

        // Format nomor dengan 5 digit
        $nomor = str_pad($nomor, 5, '0', STR_PAD_LEFT);

        // Menghasilkan kode akhir
        return '07.' . $dataHasil . '.' . $nomor;
    }
}
