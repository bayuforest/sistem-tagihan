<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan_tagihan',
        'resident_id',
        'meteran_awal',
        'meteran_akhir',
        'tagihan_air',
        'ipl',
        'abodement',
    ];

    protected $casts = [
        'bulan_tagihan' => 'date',
    ];

    // Relasi
    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    // Helper (opsional, tapi cakep)
    public function getPemakaianAirAttribute()
    {
        return $this->meteran_akhir - $this->meteran_awal;
    }

}
