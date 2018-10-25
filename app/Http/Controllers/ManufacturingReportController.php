<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ManufacturingReport;
use App\CuttingStage;
use App\OvenStage;
use App\FinalStage;
use App\Status;
use Response;

class ManufacturingReportController extends Controller
{
    public function index(){
        $ids = CuttingStage::where('deleted_at',NULL)->distinct()->get(['reference_id']);
        $reports = ManufacturingReport::where('deleted_at',NULL)->paginate(10);

        return view('ManufacturingReport.index')->with('reports',$reports)->with('ids',$ids);
    }

    public function create(Request $request){

        // $reference_id = $request->input('reference_id');
        // $cutting = CuttingStage::where('deleted_at',NULL)->where('reference_id',$reference_id)->get();
        // $oven = OvenStage::where('deleted_at',NULL)->where('reference_id',$reference_id)->get();
        // $final = FinalStage::where('deleted_at',NULL)->where('reference_id',$reference_id)->get();

        return view('ManufacturingReport.create');
    }

    public function getContent(Request $request){
        $reference_id = $request->input('reference_id');
        // $inputDate = $request->input('input_date');

        // if($reference_id && $inputDate != NULL){
        //     $content = ManufacturingReport::where('deleted_at',NULL)->where('reference_id',$reference_id)->where('updated_at',$inputDate)->distinct()->first();
        // }
        // else if($reference_id == NULL && $inputDate != NULL){

        // }
        // else if($reference_id != NULL && $inputDate == NULL){
        //     $content = ManufacturingReport::where('deleted_at',NULL)->where('reference_id',$reference_id)->distinct()->first();
        // }
        
        $content = ManufacturingReport::where('deleted_at',NULL)->where('reference_id',$reference_id)->distinct()->orderBy('updated_at','desc')->first();
        
        if($content == NULL){
            $ref_id = "Undefined";
            $status_name = "Undefined";
            $stage_name = "Undefined";
            $updated_at = "Undefined";
        }
        else{
            $ref_id = $content->reference_id;
            $status_name = $content->report_status->name;
            $stage_name = $content->report_status->category;
            $updated_at = $content->updated_at;
        }

        $response = array(
            'status_name' => $status_name,
            'ref_id' => $ref_id,
            'stage_name' => $stage_name,
            'updated_at' => $updated_at,
        );
        return Response::json($response);

    }
}
