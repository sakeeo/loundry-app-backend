<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_metode_pembayaran extends Model
{
    use HasFactory;
    protected $table="metode_pembayaran";
    protected $fillable = [
        'nama_metode',
    ];  
}
