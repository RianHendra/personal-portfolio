<?php

namespace App\Models;

use App\Models\Lowongan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perusahaan extends Model
{
    //
    use HasFactory;

    protected $fillable = ['nama', 'lokasi','gambar'];

    public function lowonganPekerjaan()
    {
        return $this->hasMany(Lowongan::class);
    }

}
