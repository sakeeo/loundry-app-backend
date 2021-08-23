<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_transaksi_pembayaran extends Model
{
    use HasFactory;
    protected $table='transaksi_pembayaran';
    protected $fillable =[
        'transaksi_id',
        'metode_pembayaran_id',
        'nama_metode',
        'jumlah_pembayaran',
    ];


}
