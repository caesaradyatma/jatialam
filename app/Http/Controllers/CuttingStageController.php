<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CuttingStage;
use App\Item;
use App\Status;
use App\Inventory;
use App\Balok;
use App\Purchasing;
use DB;
use App\ManufacturingReport;

class CuttingStageController extends Controller
{
    public function index(){
        $cuttings = CuttingStage::where('deleted_at',NULL)->orderBy('status','desc')->paginate(10);
        return view('CuttingStage.index')->with('cuttings',$cuttings);
    }

    public function precreate(){
        $purchasings = Purchasing::where('deleted_at',NULL)->where('rejected_amount','>','0')->get();
        return view('CuttingStage.precreate')->with('purchasings',$purchasings);
    }


    public function create(){
        $items = Item::all();
        $baloks = Balok::all();
        $purchasings = Purchasing::where('deleted_at',NULL)->where('rejected_amount','>','0')->get();
        $status = Status::where('category','cutting')->get();
        $inventories = Inventory::all();
        return view('CuttingStage.create')->with('items',$items)->with('status',$status)->with('inventories',$inventories)->with('baloks',$baloks)->with('purchasings',$purchasings);
    }

    public function store(Request $request){
        

        $item_array = array();
        $amount_array = array();
        $status_array = array();
        $dimension_array = array();

        $item_array = $request->input('item_id');
        $amount_array = $request->input('amount');
        $status_array = $request->input('status');
        $dimension_array = $request->input('dimension');
        
        $ref_id = uniqid();

        for($counter = 0; $counter < sizeof($item_array);$counter++){
            $cutting = new CuttingStage;
            $cutting->item_id = 1;
            $cutting->amount = $amount_array[$counter];
            $cutting->endproduct_id = $item_array[$counter];
            $cutting->status = $status_array[$counter];
            $cutting->dimension = $dimension_array[$counter];
            $cutting->reference_id = $ref_id;
            $cutting->save();
        }

        $report = new ManufacturingReport;
        $report->reference_id = $ref_id;
        $report->endproduct_id = $
        $report->status = 1;
        $report->save();
        
        return redirect('cuttings')->with('success','Process created');

    }
    
    public function show($reference_id){



        $cuttings = CuttingStage::where('reference_id',$reference_id)->where('deleted_at',NULL)->get();
        $status = Status::where('deleted_at',NULL)->where('category','cutting')->get();
        if($cuttings != NULL){
            return view('CuttingStage.show')->with('cuttings',$cuttings)->with('reference_id',$reference_id)->with('status',$status);
        }
        else{
            return redirect('cuttings')->with('error','Data not found');
        }

    }

    public function edit($id){

    }

    public function update(Request $request, $id){
        
    }

    public function update_status(Request $request, $reference_id){
        $id = $request->input('id');
        $status = $request->input('status');
        
        $cutting = CuttingStage::where('reference_id',$reference_id)->where('id',$id)->first();
        $cutting->status = $status;
        $cutting->save();

        // $report = ManufacturingReport::where('reference_id',$reference_id)->first();
        $report = new ManufacturingReport;
        $report->reference_id = $reference_id;
        $report->status = $status;
        $report->save();

        return redirect('cuttings/'.$reference_id)->with('success','Item Updated');
    }

    public function destroy($id){
        $cuttings = CuttingStage::where('reference_id',$reference_id)->get();
        $date = date('Y-m-d H:i:s');
        foreach($cuttings as $cutting){
            $cutting->deleted_at = $date;
            $cutting->save();
        }

        return redirect('cuttings')->with('success','Item Deleted');
    }
}
