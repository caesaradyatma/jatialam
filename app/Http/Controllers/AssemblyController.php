<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Assembly;

class AssemblyController extends Controller
{
   public function index() {
       $assemblies = Assembly::where('ass_delete',NULL)->get();
       return view('assembly.index')->with('assemblies',$assemblies);
   }

   public function create() {
    
    $items = Item::all();

    return view('assembly.create')->with('items',$items);
    }

    public function storee(Request $request){
        
        $item_array = array();
        $amount_array = array();
        $assignment_array = array();
   

      
        $item_array = $request->input('item_id');
        $amount_array = $request->input('ass_unit');
        $assignment_array = $request->input('ass_assignment');
        $ass_name = $request->input('ass_name');
        $ass_number = $request->input('ass_number');

   

        
        $ref_id = uniqid();

        

        for($counter = 0; $counter < sizeof($item_array);$counter++){
            $cutting = new Assembly;
            $cutting->item_id = $item_array[$counter];
            $cutting->ass_assignment = $assignment_array[$counter];
            $cutting->ass_unit = $amount_array[$counter];
            $cutting->ass_name = $ass_name;
            $cutting->ass_number = $ass_number;

            $cutting->ass_status = $ref_id;
            $cutting->save();
        }


    
       
        return redirect('assembly')->with('success','Process created');

    }

    public function show($ass_number) {
        $datas = Assembly::where('ass_number',$ass_number)->where('ass_delete',NULL)->get();
        return view('assembly.show')->with('datas',$datas)->with('ass_number',$ass_number);
    }
}
