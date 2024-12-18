<?php

namespace App\Models;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lowongan extends Model
{
    //
    use HasFactory;

    protected $fillable = ['judul', 'perusahaan_id', 'lokasi', 'jenis_pekerjaan', 'gaji', 'tanggal_akhir'];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
