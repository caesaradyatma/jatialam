<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balok extends Model
{
    //table name
    protected $table = 'baloks';

    //primary key
    public $primarykey = 'id';

    //public stamps
    public $timestamps = true;
}
