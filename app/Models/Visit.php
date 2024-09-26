<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_visit',
        'keterangan_visit',
        'pic_visit',
        'petugas_visit',
        'nomor_telepon',
        'alamat',
        'visit_status',
    ];
}
