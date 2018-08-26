<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
     //table name
     protected $table = 'inventorylists';

     //primary key
     public $primarykey = 'id';
 
     //public stamps
     public $timestamps = true;
}
