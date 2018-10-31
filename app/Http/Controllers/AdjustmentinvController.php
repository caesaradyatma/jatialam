<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Adjustment;
use App\Item;
use App\Inventory;

class AdjustmentinvController extends Controller
{
    public function index() {
        return view('adjustment.index');
    }

    public function create() {

        $cats = Inventory::where('cat_delete',NULL)->get();
        $items = Item::where('item_measurement',NULL)->get();


        return view('adjustment.create')->with(compact('cats','items'));
    }

    public function store(Request $request) {

        $adjusts = new Adjustment;
        $ref_id = str_random(4);
        $adjusts->adj_reason = $request->input('adj_reason');
        $adjusts->adj_date = $request->input('adj_date'); 
        $adjusts->adj_cat = $request->input('adj_cat');
        $adjusts->adj_items = $request->input('adj_items');
        $adjusts->adj_qty = $request->input('adj_qty');
        $adjusts->adj_ass = $request->input('adj_ass');
        $adjusts->adj_itemcode = $ref_id;
        $adjusts->adj_length = $request->input('adj_length');
        $adjusts->adj_width = $request->input('adj_width');
        $adjusts->adj_height = $request->input('adj_height');
        $adjusts->adj_note = $request->input('adj_note');
        
       
        
          
 
        $itemid =  $adjusts->adj_items; 
        $itemcode = $adjusts->adj_itemcode;
        $itemqty = $adjusts->adj_qty;
        $itemass = $adjusts->adj_ass;
        $itemcat = $adjusts->adj_cat;
        $itemdesc = $adjusts->adj_reason;
        $itemlen = $adjusts->adj_length;
        $itemwid = $adjusts->adj_width;
        $itemhei = $adjusts->adj_height;
           
 
        $result = $this->updateInventorylistsTable($itemid,$itemcode,$itemqty,$itemass,$itemcat,$itemdesc,$itemlen,$itemwid,$itemhei);
     
 
        if($result == true){
 
        $adjusts->save();
 
        return redirect('/adjustment')->with('success','Successfully adjusted');
 
        }  else {
 
         return 0;
        }
    }

    public function updateInventorylistsTable($itemid,$itemcode,$itemqty,$itemass,$itemcat,$itemdesc,$itemlen,$itemwid,$itemhei){

        $adjusts = new Item;
        $adjusts->item_name = $itemcode;
        $adjusts->item_qty = $itemqty; 
        $adjusts->item_assembly = $itemass;
        $adjusts->inventory_id = $itemcat;
        $adjusts->item_description = $itemdesc;
        $adjusts->item_length = $itemlen;
        $adjusts->item_width = $itemwid;
        $adjusts->item_height = $itemhei;
   
        $adjusts->save();

        $amount = Item::find($itemid);

        $qty = $amount->item_qty;

        $result = $qty - $itemqty;

        $amount->item_qty = $result;

        $amount->save();
            return true;
     }

     
}
