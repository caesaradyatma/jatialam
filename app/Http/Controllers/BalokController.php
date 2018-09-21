<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Balok;


class BalokController extends Controller
{
    public function index(){
        $lists = Balok::all();
        return view('inventory.rawitem.index')->with('lists',$lists);
    }

    public function create() {
        $items = Balok::all();
        return view('inventory.rawitem.create')->with('items',$items);
    }

    public function store(Request $request) {
        $baloks = new Balok;
        $baloks->code = $request->input('code');
        $baloks->quantity = $request->input('quantity');
        $baloks->balok_measure = $request->input('balok_measure');
        $baloks->details = $request->input('details');
 
        $baloks->save();
 
        return redirect('/balok')->with('success','Successfully Added');
    }
}
