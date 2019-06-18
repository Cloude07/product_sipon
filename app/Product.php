<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function tags()
 {
 return $this->belongsToMany(App\Tag::class);
 // Строку следует читать так:
 // «Эта сущность (товар) относится ко многим тегам;
 // вернуть множество этих тегов»

 // То же самое можно было бы записать иначе:
 // $this->belongsToMany('App\Tag');
 }


	 protected $fillable = ['title','price','manufacturer_id','user_id'];
     public function manufacturer()    
	 {         
	 return $this->belongsTo(App\Manufacturer::class); 
	 }
}
