<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
     //table name
     protected $table = 'itemeasurement';

     //primary key
     public $primarykey = 'id';
 
     //public stamps
     public $timestamps = true;

     public function item(){
      return $this->belongsTo(Item::class);
    }
}
