<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;
    protected $fillable = [
        'kelurahan', 'kecamatan', 'kota'
    ];
    protected $table = 'regions';
    public function pasiens() {
        return $this->hasMany(pasien::class);
    }
}
