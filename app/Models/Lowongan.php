<?php

namespace App\Models;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lowongan extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $fillable = [

        'posisi',
        'deskripsi',
        'gaji',
        'perusahaan_id'
    ];

    public function perusahaan(): BelongsTo{
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }
}
