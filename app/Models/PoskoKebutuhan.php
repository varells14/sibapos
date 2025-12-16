<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PoskoKebutuhan extends Model
{
    use HasFactory;

    protected $table = 'posko_kebutuhans';

    protected $fillable = [
        'posko_id',
        'nama_kebutuhan',
        'jumlah',
        'satuan',
        'prioritas',
        'keterangan'
    ];

    /**
     * Relasi: kebutuhan milik satu posko
     */
    public function posko()
    {
        return $this->belongsTo(Posko::class, 'posko_id');
    }
}
