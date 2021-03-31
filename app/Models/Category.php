<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    use HasFactory;
    protected  $table='categories';

    function products()
    {
        return $this->hasMany(Product::class, 'category_id','id');

    }
}
