<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;


use App\Assembly;

class PDFController extends Controller
{
    public function pdf($ass_number) {
        
        $tai = Assembly::where('ass_number','=', $ass_number)->where('ass_delete',NULL)->get();
        $test = Assembly::where('ass_number','=', $ass_number)->where('ass_delete',NULL)->first();
        $as_name = $test->ass_name;
        $as_num = $test->ass_number;
        $as_stat = $test->ass_status;
        $as_desc = $test->ass_desc;
        $as_creation = $test->creation_date;
        $as_final = $test->final_date;
        $pdf = PDF::loadView('assembly.pdf',compact('tai','as_name','as_num','as_stat','as_desc','as_creation','as_final'));
        
        return $pdf->stream('Assembly.pdf');
    
    }
}
