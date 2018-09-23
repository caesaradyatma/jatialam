<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalStage extends Model
{
    public function final_status()
    {
        return $this->belongsTo('App\Status','status');
    }

    public function final_endproduct()
    {
        return $this->belongsTo('App\Inventory','endproduct_id');
    }
}
