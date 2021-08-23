<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_outlet extends Model
{
    use HasFactory;
    protected $table="outlet";
    protected $fillable = [
        'nama_usaha',
        'hp',
        'alamat'
    ];

}
