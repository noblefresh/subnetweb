<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function cart(){
        return $this->hasMany('App\Models\cart', 'productid', 'id');
    }
}
