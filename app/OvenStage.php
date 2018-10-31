<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OvenStage extends Model
{
    //
    public function oven_status()
    {
        return $this->belongsTo('App\Status','status');
    }

    public function open_produk()
    {
        return $this->belongsTo('App\Inventory','endproduct_id');
    }
}
