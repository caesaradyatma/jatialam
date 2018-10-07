<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ManufacturingReport;
use App\CuttingStage;
use App\OvenStage;
use App\FinalStage;
use App\Status;

class ManufacturingReportController extends Controller
{
    public function index(){
        // $ids = CuttingStage::where('deleted_at',NULL)->distinct()->get(['reference_id']);

        $reports = ManufacturingReport::where('deleted_at',NULL)->paginate(10);

        return view('ManufacturingReport.index')->with('reports',$reports);
    }

    public function create(Request $request){

        // $reference_id = $request->input('reference_id');
        // $cutting = CuttingStage::where('deleted_at',NULL)->where('reference_id',$reference_id)->get();
        // $oven = OvenStage::where('deleted_at',NULL)->where('reference_id',$reference_id)->get();
        // $final = FinalStage::where('deleted_at',NULL)->where('reference_id',$reference_id)->get();

        return view('ManufacturingReport.create');
    }
}
