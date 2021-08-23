<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_customer extends Model
{
    use HasFactory;
    protected $table='customer';
    protected $fillable=[
        'nama',
        'hp',
        'outlet_id'
    ];
}
