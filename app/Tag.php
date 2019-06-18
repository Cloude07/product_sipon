<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    return $this->belongsToMany(App\Product::class);
 // Строку следует читать так:
 // «Эта сущность (тег) относится ко многим товарам»;
 // вернуть множество этих товаров»
 // То же самое можно было бы записать иначе:
 // $this->belongsToMany('App\Product');

}
