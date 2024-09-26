<?php

namespace App\Imports;

use App\Models\KeteranganVisit;
use Maatwebsite\Excel\Concerns\ToModel;

class KeteranganVisitImport implements ToModel
{
    public function model(array $row)
    {
        return new KeteranganVisit([
            'keterangan' => $row[0],
            'alamat' => $row[1],
            'nomor_telepon' => $row[2],
        ]);
    }
}
