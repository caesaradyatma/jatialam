<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Inventory;
use App\Item;

use DB;

class ItemController extends Controller 
{
    public function itemShow($id){

        $items = Inventory::find($id)->item->where('item_measurement',null);
        $stuff = Inventory::find($id);
    
        return view('inventory.item.show')->with(compact('items','stuff'));
       
    }

    public function store(Request $request) {
        $items = new Item;
        $ref_id = str_random(4);
        $items->item_name = $ref_id;
        $items->item_measurement = $request->input('item_measurement'); 
        $items->inventory_id = $request->input('inventory_id');
        $items->item_qty = $request->input('item_qty');
        $items->item_length = $request->input('item_length');
        $items->item_width = $request->input('item_width');
        $items->item_height = $request->input('item_height');
        $items->item_assembly = $request->input('item_assembly');
        $items->item_description = $request->input('item_description');

        $items->save();
        return redirect('/inventory');
    }

    public function createe()
    {
        $lists = Inventory::all();

        if (count($lists != NULL)) {
           
           $lists = Inventory::where('cat_delete',NULL)->get();
           return View('inventory.item.create')->with('items',$lists); 
        } else {
            return view('inventory.create');
        }
       
       
    }

    public function update(Request $request,$id)
    {
        $lists = Item::find($id);
       $lists->item_name = $request->input('item_name');
       $lists->item_length = $request->input('item_length');
       $lists->item_width = $request->input('item_width');
       $lists->item_height = $request->input('item_height');

       $lists->item_assembly = $request->input('item_assembly');
 
   
       $lists->item_qty = $request->input('item_qty');

       return $lists;
   
        $lists->save();
        return redirect('/inventory')->with('success', 'Item edited');
    }

    public function destroy($id)
    {
        $date = date('Y-m-d');
        $stuff = Item::where('inventory_id','=', $id)->where('item_measurement',null)->first();
        $stuff->item_measurement = $date;
        $stuff->save();
       
       
        return redirect('/inventory')->with('success', 'Item removed');
    }

    

    
}
