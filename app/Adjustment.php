<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
     //table name
     protected $table = 'adjustmentitems';

     //primary key
     public $primarykey = 'id';
 
     //public stamps
     public $timestamps = true;

     public function item_adj() {
        return $this->hasMany(Item::class);
     }

     public function item_detail() {
        return $this->belongsTo(Item::class);
     }
}
