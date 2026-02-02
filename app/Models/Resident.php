<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $table = 'residents';

    protected $fillable = [
        'alamat',
        'nama',
    ];

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }

}
