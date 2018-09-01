<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CuttingStage;
use App\Item;

class CuttingStageController extends Controller
{
    public function index(){
        $cuttings = CuttingStage::where('deleted_at',NULL)->paginate(10);
        return view('CuttingStage.index');
    }

    public function create(){
        return view('CuttingStage.create');
    }

    public function store(Request $request){
        
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
