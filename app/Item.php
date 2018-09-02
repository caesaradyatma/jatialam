<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     //table name
     protected $table = 'items';

     //primary key
     public $primarykey = 'id';

     protected $fillable = ['cat_id'];
 
     //public stamps
     public $timestamps = true;

     public function inventory(){
      return $this->hasMany('App\inventory');
 }
}
