<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
     //table name
     protected $table = 'assamblies';

     //primary key
     public $primarykey = 'id';
 
     //public stamps
     public $timestamps = true;

     public function item_inih()
     {
         return $this->belongsTo('App\Item','item_id');
     }
 
}
