<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     //table name
     protected $table = 'items';

     //primary key
     public $primarykey = 'id';
 
     //public stamps
     public $timestamps = true;

     public function inventory(){
      return $this->belongsTo(Inventory::class);
    }

  

    

   
}
