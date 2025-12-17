<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posko extends Model
{
    use HasFactory;

    protected $table = 'poskos';

    protected $fillable = [
        'nama_posko',
        'kelurahan',
        'alamat',
        'kondisi_bencana',
        'status',
        'jam_operasional',
        'pic', 
        'phone',
        'image_url'
    ];

    // Relasi ke kebutuhan posko
    public function kebutuhans()
    {
        return $this->hasMany(PoskoKebutuhan::class, 'posko_id');
    }

    // Relasi ke user (pic)
    public function picUser()
    {
        return $this->belongsTo(User::class, 'pic'); // 'pic' adalah user_id
    }
}
