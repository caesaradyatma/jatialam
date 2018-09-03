<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Inventory;
use App\Item;

class ItemController extends Controller
{
    public function itemShow($id){

        $items = Inventory::find($id)->item;

        return view('inventory.item.show')->with('items',$items);
       
    }

    public function store(Request $request) {
        $items = new Item;
        $items->item_name = $request->input('item_name');
        $items->item_measurement = $request->input('item_measurement'); 
        $items->inventory_id = $request->input('inventory_id');
        $items->item_qty = $request->input('item_qty');
        $items->item_assembly = $request->input('item_assembly');
        $items->item_description = $request->input('item_description');

        $items->save();
        return redirect('/inventory');
    }

    public function create()
    {
        $items = Inventory::all();
        return View('inventory.item.create')->with('items',$items); 
       
    }
}
