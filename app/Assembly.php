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

     public function ass_dimension()
     {
         return $this->belongsTo('App\Item','item_id');
     }
 
}
