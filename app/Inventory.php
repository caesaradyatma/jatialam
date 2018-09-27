<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function scopeSearch($query, $test){
        return $query->where('cat_name', 'like', '%' . $test . '%');
        
      
     }

     //table name
     protected $table = 'inventorylists';

     //primary key
     public $primarykey = 'id';
 
     //public stamps
     public $timestamps = true;

     public function item()
     {
         return $this->hasMany('App\Item');
     }

    
   

    
}
