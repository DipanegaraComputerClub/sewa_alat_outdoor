<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Alat extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function order() {
        return $this->hasMany(Order::class,'alat_id','id');
    }

    public function userRatings()
    {
        return $this->hasMany(Rating::class,'rating_id','id');
    }

    public function hitungDenda()
    {
        $tanggalKembali = Carbon::parse($this->tanggal_kembali);
        $tanggalSekarang = Carbon::now();

        // Hitung selisih hari antara tanggal kembali dan sekarang
        $selisihHari = $tanggalKembali->diffInDays($tanggalSekarang);

        // Denda per hari (ganti dengan nilai yang sesuai)
        $dendaPerHari = 10; // Contoh: denda sebesar Rp 10.000 per hari

        // Hitung total denda
        $totalDenda = $selisihHari * $dendaPerHari;

        // Jangan biarkan denda menjadi negatif
        return max(0, $totalDenda);
    }
}
