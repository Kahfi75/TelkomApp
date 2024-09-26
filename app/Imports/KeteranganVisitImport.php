<?php

namespace App\Imports;

use App\Models\KeteranganVisit;
use Maatwebsite\Excel\Concerns\ToModel;

class KeteranganVisitImport implements ToModel
{
    public function model(array $row)
    {
        return new KeteranganVisit([
            'keterangan'    => $row[0], // Sesuaikan dengan kolom di file Excel
            'alamat'        => $row[1], // Sesuaikan dengan kolom di file Excel
            'nomor_telepon' => $row[2], // Pastikan kolom ini sesuai dengan nama di database
        ]);
    }
}
