<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManufacturingReport extends Model
{
    public function report_status()
    {
        return $this->belongsTo('App\Status','status');
    }
}
