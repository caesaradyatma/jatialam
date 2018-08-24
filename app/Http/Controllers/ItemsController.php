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

        $item = new Item;
        $item->name = $request->input('name');
        $item->type = $request->input('measurement');
        $item->measurement = $request->input('measurement');
        $item->save();

        return redirect('/items')->with('success','Item Added');
    }

    public function show($id){

        $item = Item::where('deleted_at',NULL)->where('id',$id)->get();
        return view('Item.show')->with('item',$item);

    }

    public function edit(){
        return view('Items.edit');
    }

    public function update(Request $request, $id){
        $this->validate($request,[
          'type' => 'required',
          'name' => 'required',
          
        ]);

        $item = Item::find($id);
        $item->name = $request->input('name');
        $item->type = $request->input('measurement');
        $item->measurement = $request->input('measurement');
        $item->save();
        
        return redirect('/items')->with('success','Item Updated');
    }

    public function destroy($id){
        $item = Item::find($id);
        $date = ('Y-m-d');
        $item->deleted_at = $date;
        $item->save();

        return redirect('/items')->with('success','Item Deleted');
    }
}
