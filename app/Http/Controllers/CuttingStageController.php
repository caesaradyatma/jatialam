<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CuttingStage;
use App\Item;
use App\Status;

class CuttingStageController extends Controller
{
    public function index(){
        $cuttings = CuttingStage::where('deleted_at',NULL)->paginate(10);
        return view('CuttingStage.index')->with('cuttings',$cuttings);
    }

    public function create(){
        $items = Item::all();
        $status = Status::all();
        return view('CuttingStage.create')->with('items',$items)->with('status',$status);
    }

    public function store(Request $request){
        
        $cutting = new CuttingStage;
        // $cutting->item_name = $request->input('item_name');
        $cutting->item_id = $request->input('item_id');
        $cutting->amount = $request->input('amount');
        $cutting->status = $request->input('status');
        $cutting->save();

        return redirect('cuttingstage')->with('success','Process created');

    }
    
    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){
        
    }
}
