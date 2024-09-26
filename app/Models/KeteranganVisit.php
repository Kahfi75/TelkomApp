<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeteranganVisit extends Model
{
    protected $fillable = [
        'keterangan',
        'alamat',
        'nomor_telepon', // Pastikan kolom ini ada di $fillable
    ];
}
