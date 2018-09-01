<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchasing extends Model
{
    protected $fillable = ['item_name','item_id','sender_pic','expected_amount','real_amount','reference_id','arrival_date','deleted_at'];

    public function item()
    {
      return $this->belongsTo('App\Item','item_id');
    }
}
