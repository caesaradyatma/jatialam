<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Status;
use App\OvenStage;
use App\CuttingStage;
use App\Inventory;
use App\ManufacturingReport;

class OvenStageController extends Controller
{
    public function index(){
        $ovens = OvenStage::where('deleted_at',NULL)->paginate(10)->all();
        return view('OvenStage.index')->with('ovens',$ovens);
    }

    public function create(Request $request){
        // $cuttings = CuttingStage::where('deleted_at',NULL)->where('status',3)->get();
        // $items = Item::all();
        $status = Status::where('category','oven')->get();
        // return view('OvenStage.create')->with('items',$items)->with('status',$status)->with('cuttings',$cuttings);
        $reference_id = $request->input('reference_id');
        $cuttings = CuttingStage::where('reference_id',$reference_id)->where('deleted_at',NULL)->get();
        $inventorylists = Inventory::all();
        
        return view('OvenStage.create')->with('cuttings',$cuttings)->with('status',$status)->with('reference_id',$reference_id)->with('inventorylists',$inventorylists);
    }
    
    public function precreate(){
        $cuttings = CuttingStage::where('deleted_at',NULL)->where('status',3)->get();
        $cutting_refs = CuttingStage::where('deleted_at',NULL)->where('status',3)->distinct()->get(['reference_id']);
        $items = Item::all();
        $status = Status::all();
        return view('OvenStage.precreate')->with('items',$items)->with('status',$status)->with('cuttings',$cuttings)->with('cutting_refs',$cutting_refs);
    }

    // public function get_ref(Request $request){
    //     $reference_id = $request->input('reference_id');
    //     $cuttings = CuttingStage::where('reference_id',$reference_id)->where('deleted_at',NULL)->get();
    //     return view('OvenStage.create')->with('cuttings',$cuttings);
    // }

    public function store(Request $request){
        
        $item_array = array();
        $status_array = array();
        $amount_array = array();

        $item_array = $request->input('item_id');
        $amount_array = $request->input('amount');
        $status_array = $request->input('status'); 
        $size = sizeof($item_array);

        if($request->input('reference_id') == 0){
            $ref_id = uniqid();
        }
        else{
            $ref_id = $request->input('reference_id');
        }

        for($counter = 0;$counter < $size;$counter++){
            $oven = new OvenStage;
            $oven->item_id = $item_array[$counter];;
            $oven->endproduct_id = $item_array[$counter];
            $oven->amount = $amount_array[$counter];
            $oven->status = $status_array[$counter];
            $oven->reference_id = $ref_id;
            $oven->save();
        }

        // $check = ManufacturingReport::where('reference_id',$ref_id)->first();
        // if($check == NULL){
        //     $report = new ManufacturingReport;
        //     $report->reference_id = $ref_id;
        //     $report->status = 4;
        //     $report->save();
        // }
        // else{
        //     $report = ManufacturingReport::where('reference_id',$ref_id)->first();
        //     $report->status = 4;
        //     $report->save();
        // }
        
        $report = new ManufacturingReport;
        $report->reference_id = $ref_id;
        $report->status = 4;
        $report->save();
        return redirect('ovens')->with('success','Process created');

    }
    
    public function show($reference_id){

        $ovens = OvenStage::where('reference_id',$reference_id)->where('deleted_at',NULL)->get();
        $status = Status::where('category','oven')->get();
        if($ovens != NULL){
            return view('OvenStage.show')->with('ovens',$ovens)->with('reference_id',$reference_id)->with('status',$status);
        }
        else{
            return redirect('ovens')->with('error','Data not found');
        }

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function update_status(Request $request, $reference_id){
        $id = $request->input('id');
        $status = $request->input('status');
        $oven = OvenStage::where('reference_id',$reference_id)->where('id',$id)->first();
        $oven->status = $status;
        $oven->save();

        // $report = ManufacturingReport::where('reference_id',$reference_id)->first();
        // if($report == NULL){
        //     $report = new ManufacturingReport;
        //     $report->reference_id = $reference_id;
        //     $report->status = $status;
        //     $report->save();
        // }
        // else{
        //     $report->status = $status;
        //     $report->save();
        // }
        
        $report = new ManufacturingReport;
        $report->reference_id = $reference_id;
        $report->status = $status;
        $report->save();
        return redirect('ovens/'.$reference_id)->with('success','Item Updated');
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
