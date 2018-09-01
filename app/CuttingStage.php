<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuttingStage extends Model
{
    protected $fillable = ['item_id','amount','status','deleted_at'];

    public function cutting_item()
    {
        return $this->belongsTo('App\Item','item_id');
    }

    public function cutting_status()
    {
        return $this->belongsTo('App\Status','status');
    }
}
