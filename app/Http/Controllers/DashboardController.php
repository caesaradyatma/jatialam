<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Assembly;
use App\Purchasing;




class DashboardController extends Controller
{
    public function index() {
    
    $item_req = Item::where('item_measurement',null)->sum('item_qty');
    $ass_detail = Assembly::where('ass_delete',null)->paginate(5);
    $pro_detail = Purchasing::where('deleted_at',null)->paginate(5);
    return view('dashboard.index')->with('item_req',$item_req)->with('ass_detail',$ass_detail)->with('pro_detail',$pro_detail);
    }
}
