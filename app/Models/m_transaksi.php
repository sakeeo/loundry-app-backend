<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_transaksi extends Model
{
    use HasFactory;
    protected $table='transaksi';
    protected $fillable=[
        'tanggal_masuk',
        'tanggal_selesai',
        'tanggal_pengambilan',
        'customer_id',
        'outlet_id',
        'status',
        'status_pembayaran',
    ];

 

    public function getDetail()
    {
        return $this->hasMany(m_transaksi_detail::class,'transaksi_id','id');
    }

    public function getPembayaran()
    {
        return $this->hasMany(m_transaksi_pembayaran::class,'transaksi_id','id');
    }

    public function getOutlet()
    {
        return $this->hasOne(m_outlet::class,'id','outlet_id');
    }
    public function getCustomer()
    {
        return $this->hasOne(m_customer::class,'id','customer_id');
    }


    




}
