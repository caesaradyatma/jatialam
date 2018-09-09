<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Status;
use App\OvenStage;
use App\CuttingStage;

class OvenStageController extends Controller
{
    public function index(){
        $ovens = OvenStage::where('deleted_at',NULL)->paginate(10);
        return view('OvenStage.index')->with('ovens',$ovens);
    }

    public function create(){
        $cuttings = CuttingStage::where('deleted_at',NULL)->where('status',3)->get();
        $items = Item::all();
        $status = Status::all();
        return view('OvenStage.create')->with('items',$items)->with('status',$status)->with('cuttings',$cuttings);
    }
    
    public function precreate(){
        $cuttings = CuttingStage::where('deleted_at',NULL)->where('status',3)->get();
        $items = Item::all();
        $status = Status::all();
        return view('OvenStage.precreate')->with('items',$items)->with('status',$status)->with('cuttings',$cuttings);
    }

    public function get_ref(){
        
    }

    public function store(Request $request){
        
        $item_array = array();
        $amount_array = array();
        $status_array = array();

        $item_array = $request->input('item_id');
        $amount_array = $request->input('amount');
        $status_array = $request->input('status');
        $time = time();
        $ref_id = srand($time);

        for($counter = 0; $counter < sizeof($item_array);$counter++){
            $oven = new OvenStage;
            $oven->item_id = $item_array[$counter];
            $oven->amount = $amount_array[$counter];
            $oven->status = $status_array[$counter];
            $oven->reference_id = $ref_id;
            $oven->save();
        }
        
        return redirect('ovens')->with('success','Process created');

    }
    
    public function show($reference_id){

        $ovens = OvenStage::where('reference_id',$reference_id)->where('deleted_at',NULL)->get();
        
        if($ovens != NULL){
            return view('OvenStage.show')->with('ovens',$ovens)->with('reference_id',$reference_id);
        }
        else{
            return redirect('ovens')->with('error','Data not found');
        }

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){
        $ovens = OvenStage::where('reference_id',$reference_id)->get();
        $date = date('Y-m-d H:i:s');
        foreach($ovens as $oven){
            $oven->deleted_at = $date;
            $oven->save();
        }

        return redirect('ovens')->with('success','Item Deleted');
    }
}
