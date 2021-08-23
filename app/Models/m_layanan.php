<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_layanan extends Model
{
    use HasFactory;
    protected $table = 'layanan';
    protected $fillable = [
        'nama_layanan',
        'satuan',
        'hargasatuan',
        'outlet_id'

    ];
}
