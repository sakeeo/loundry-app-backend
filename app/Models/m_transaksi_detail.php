<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_transaksi_detail extends Model
{
    use HasFactory;
    protected $table='transaksi_detail';
    protected $fillable=[
        'transaksi_id',
        'layanan_id',
        'nama_layanan',
        'satuan',
        'harga_satuan',
        'jumlah',
    ];




}
