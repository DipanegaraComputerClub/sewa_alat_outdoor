<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Tambahkan kolom 'user_id' ke sini
        'rating',
        'alat_id',
        'nama_alat',
        // Kolom-kolom lain yang dapat diisi secara masal
    ];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function alat() {
        return $this->belongsTo(Alat::class, 'alat_id');
    }
}
