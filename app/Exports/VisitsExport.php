<?php

namespace App\Exports;

use App\Models\Visit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VisitsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Mengambil data kunjungan termasuk kolom yang ingin diekspor
        return Visit::select(
            'id',
            'tanggal_visit',
            'keterangan_visit',
            'pic_visit',
            'petugas_visit',
            'nomor_telepon',
            'alamat',
            'visit_status'  // Pastikan nama kolom sesuai dengan yang ada di tabel
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tanggal Visit',
            'Keterangan Visit',
            'PIC Pelanggan',
            'Petugas Visit',
            'Nomor Telepon',
            'Alamat',
            'Status Visit',  // Pastikan nama ini sesuai dengan yang Anda gunakan
        ];
    }
}
