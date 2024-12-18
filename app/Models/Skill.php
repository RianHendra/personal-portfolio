<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',   
        'category',
    ];

    /**
     * Relationship: Skill belongs to a User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
