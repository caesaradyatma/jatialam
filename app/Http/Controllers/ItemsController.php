<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemsController extends Controller
{
    public function index(){
        $items = Item::where('deleted_at',null)->paginate(10);
        return view('Items.index')->with('items',$items);
    }

    public function create(){
        return view('Items.create');
    }

    public function store(Request $request){
        $this->validate($request,[
          'type' => 'required',
          'name' => 'required',
          
        ]);

        $name = $request->input('name');
        $measurement = $request->input('measurement');
        $type = $request->input('type');
    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }
}
