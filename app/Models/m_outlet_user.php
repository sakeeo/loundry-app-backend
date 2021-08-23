<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_outlet_user extends Model
{
    use HasFactory;
    protected $table='outlet_user';
    protected $fieldlabel = ['email','password','outlet_id'];

    public function getOutlet()
    {
        return $this->hasOne(m_outlet::class,'outlet_id','id');
    }
}

