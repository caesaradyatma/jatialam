<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Inventory;
use App\Item;

class ItemController extends Controller
{
    public function itemShow(){
        return view('inventory.show');
    }

    public function store(Request $request) {
        $items = new Item;
        $items->item_name = $request->input('item_name');
        $items->item_measurement = $request->input('item_measurement'); 
        $items->cat_id = $request->input('cat_id');
        $items->item_qty = $request->input('item_qty');
        $items->item_assembly = $request->input('item_assembly');
        $items->item_description = $request->input('item_description');

        $items->save();
        return redirect('/inventory')->with('success','Successfully adjusted');
    }

    public function create()
    {
        $items = Inventory::all();
        return View('inventory.item.create')->with('items',$items); 
       
    }
}
