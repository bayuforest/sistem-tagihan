<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resident extends Model
{
    use HasFactory, SoftDeletes;

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
