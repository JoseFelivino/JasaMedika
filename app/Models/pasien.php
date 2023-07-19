<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $fillable = [
       'PasienId', 'Name', 'Address', 'Phone', 'Rtrw', 'KelurahanId', 'Dob', 'Gender'
    ];
    protected $table = 'pasiens';
    public function regions()
    {
        return $this->belongsTo(region::class);
    }
    public static function generateId()
    {
        $lastId = User::orderBy('id', 'desc')->first();

        if ($lastId) {
            $lastGeneratedId = $lastId->generated_id;
            $lastIncrement = (int) substr($lastGeneratedId, 6); // Extract the increment part
            $newIncrement = $lastIncrement + 1;
            $newGeneratedId = date('ym') . str_pad($newIncrement, 6, '0', STR_PAD_LEFT);
        } else {
            $newGeneratedId = date('ym') . '000001';
        }
        return $newGeneratedId;
    }
}
