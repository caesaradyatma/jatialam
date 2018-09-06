<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public function scopeSearch($query, $test){
        if ($test != '') {
            $query->where(function ($query) use ($test) {
                $query->where("item_assembly", "LIKE","%$test%");
                   
            });
        }elseif($test == 0) {
            return NULL;
        }
        return $query;
       
        
      
     }

     //table name
     protected $table = 'items';

     //primary key
     public $primarykey = 'id';
 
     //public stamps
     public $timestamps = true;
}
