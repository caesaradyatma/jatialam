<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
     //table name
     protected $table = 'assamblies';

     //primary key
     public $primarykey = 'id';

     public $incrementing = false;
 
     //public stamps
     public $timestamps = true;

     public function item_inih()
     {
         return $this->belongsTo('App\Item','item_id');
     }

     public function cat_ah()
     {
         return $this->belongsTo('App\Inventory','ass_dimension');
     }
 
}
