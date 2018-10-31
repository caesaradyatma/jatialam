<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Status;
use App\OvenStage;
use App\FinalStage;
use App\ManufacturingReport;
use DB;

class FinalStageController extends Controller
{
    public function index(){
        $finals = FinalStage::where('deleted_at',NULL)->paginate(10);
        return view('FinalStage.index')->with('finals',$finals);
    }

    public function create(Request $request){
        $status = Status::where('category','final')->get();
        $reference_id = $request->input('reference_id');
        $ovens = OvenStage::where('reference_id',$reference_id)->where('deleted_at',NULL)->get();
        return view('FinalStage.create')->with('ovens',$ovens)->with('status',$status)->with('reference_id',$reference_id);
    }

    public function precreate(){
        $ovens = OvenStage::where('deleted_at',NULL)->where('status',6)->get();
        //check if process is already created
        $clean_refs = DB::table('oven_stages')
                        ->join('final_stages','oven_stages.reference_id','=','final_stages.reference_id')
                        ->select('final_stages.reference_id')
                        ->distinct('reference_id')
                        ->get();
        $clean_array = array();
        foreach($clean_refs as $clean_ref){
            array_push($clean_array, $clean_ref->reference_id);
        }
        $oven_refs = DB::table('oven_stages')
                        ->where('deleted_at',NULL)
                        ->where('status',6)
                        ->WhereNotIn('reference_id',$clean_array)
                        ->distinct()
                        ->select('reference_id')
                        ->get();
        $items = Item::all();
        $status = Status::all();
        return view('FinalStage.precreate')->with('items',$items)->with('status',$status)->with('ovens',$ovens)->with('oven_refs',$oven_refs);
    }


    public function store(Request $request){
        
        $item_array = array();
        $status_array = array();
        $amount_array = array();
        $dimension_array = array();
        $estimation_array = array();

        $item_array = $request->input('item_id');
        $amount_array = $request->input('amount');
        $status_array = $request->input('status');
        $dimension_array = $request->input('dimension');
        $estimation_array = $request->input('estimation_time');
        $ref_id = $request->input('reference_id');

        for($counter = 0; $counter < sizeof($item_array);$counter++){
            $final = new finalStage;
            $final->endproduct_id = $item_array[$counter];
            $final->amount = $amount_array[$counter];
            $final->status = $status_array[$counter];
            $final->dimension = $dimension_array[$counter];
            $final->estimation_time = $estimation_array[$counter];
            $final->reference_id = $ref_id;
            $final->save();
        }

        // $report = ManufacturingReport::where('reference_id',$ref_id)->first();
        // $report->reference_id = $ref_id;
        // $report->status = 7;
        // $report->save();

        $report = new ManufacturingReport;
        $report->reference_id = $ref_id;
        $report->status = 7;
        $report->save();
        
        return redirect('finals')->with('success','Process Berhasil Dibuat');

    }

    public function show($reference_id){

        $finals = FinalStage::where('reference_id',$reference_id)->where('deleted_at',NULL)->get();
        $status = Status::where('category','final')->get();
        if($finals != NULL){
            return view('FinalStage.show')->with('finals',$finals)->with('reference_id',$reference_id)->with('status',$status);
        }
        else{
            return redirect('finals')->with('error','Data Tidak Ditemukan');
        }

    }

    public function update_status(Request $request, $reference_id){
        $id = $request->input('id');
        $status = $request->input('status');
        $final = FinalStage::where('reference_id',$reference_id)->where('id',$id)->first();
        $final->status = $status;
        $final->save();

        // $report = ManufacturingReport::where('reference_id',$reference_id)->first();
        // $report->status = $status;
        // $report->save();

        $report = new ManufacturingReport;
        $report->reference_id = $reference_id;
        $report->status = $status;
        $report->save();
        
        return redirect('finals/'.$reference_id)->with('success','Status Berhasil Diupdate');
    }

    public function destroy($id){
        $finals = finalStage::where('reference_id',$reference_id)->get();
        $date = date('Y-m-d H:i:s');
        foreach($finals as $final){
            $final->deleted_at = $date;
            $final->save();
        }

        return redirect('finals')->with('success','Process Berhasil Dihapus');
    }
    



    
}
