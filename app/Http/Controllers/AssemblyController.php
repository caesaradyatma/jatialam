<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Assembly;
use App\Inventory;

class AssemblyController extends Controller
{
   public function index() {
       $assemblies = Assembly::where('ass_delete',NULL)->get();
       return view('assembly.index')->with('assemblies',$assemblies);
   }

   public function create() {
    
    $items = Item::where('item_measurement',null)->get();
    $cats = Inventory::all();

    return view('assembly.create')->with(compact('items','cats'));
    }

    public function storee(Request $request){
        
        $item_array = array();
        $amount_array = array();
        $assignment_array = array();
        $dimension_array = array();
   

      
        $item_array = $request->input('item_id');
        $amount_array = $request->input('ass_unit');
        $assignment_array = $request->input('ass_assignment');
        $dimension_array = $request->input('ass_dimension');
        $ass_name = $request->input('ass_name');
        $ass_number = $request->input('ass_number');
        $ass_status = $request->input('ass_status');
        $ass_desc = $request->input('ass_desc');
        $ass_creation = $request->input('ass_creation');
        $ass_final = $request->input('ass_final');

        

        for($counter = 0; $counter < sizeof($item_array);$counter++){
            $ass = new Assembly;
            $ass->item_id = $item_array[$counter];
            $ass->ass_assignment = $assignment_array[$counter];
            $ass->ass_unit = $amount_array[$counter];
            $ass->ass_dimension = $dimension_array[$counter];
            $ass->ass_name = $ass_name;
            $ass->ass_number = $ass_number;
            $ass->ass_status = $ass_status;
            $ass->ass_desc = $ass_desc;
            $ass->creation_date = $ass_creation;
            $ass->final_date = $ass_final;

            $ass->save();
        }


    
       
        return redirect('assembly')->with('success','Process created');

    }

    public function show($ass_number) {
        $datas = Assembly::where('ass_number',$ass_number)->where('ass_delete',NULL)->orderBy('created_at','desc')->paginate(10);
        $test = Assembly::where('ass_number',$ass_number)->where('ass_delete',NULL)->first();
        $date_creation = $test->creation_date;
        $date_final = $test->final_date;
        $desc_ass = $test->ass_desc;
        $delet = $test->ass_number;
            return view('assembly.show')->with('test',$test)->with('datas',$datas)->with('ass_number',$ass_number)->with('date_c',$date_creation)->with('date_f',$date_final)->with('desc',$desc_ass);
      
        
    }

    public function destroy($ass_number)
    {
        $date = date('Y-m-d');
        $items = Assembly::where('ass_number','=', $ass_number)->where('ass_delete',NULL)->get();
        foreach($items as $item){
            $item->ass_delete = $date;
            $item->save();
        }

    
        return redirect('/assembly')->with('success', 'Item removed');
    }

}
