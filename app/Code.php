<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public function scopeSearch($query, $test){
        return $query->where('item_assembly', 'like', '%' . $test . '%');
        
      
     }

     //table name
     protected $table = 'items';

     //primary key
     public $primarykey = 'id';
 
     //public stamps
     public $timestamps = true;
}
