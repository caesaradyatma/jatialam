<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchasing;
use App\Item;
use App\Inventory;

class PurchasingsController extends Controller
{
    public function index(){
        $purchasings = Purchasing::where('deleted_at',NULL)->paginate(10);
        return view('Purchasing.index')->with('purchasings',$purchasings);
    }

    public function create(){
        $items = Inventory::all();
        return view('Purchasing.create')->with('items',$items);
    }

    public function store(Request $request){
        
        
        $this->validate($request,[
            'rejected_amount' => 'required',
            'amount' => 'required',
            'sender_pic' => 'required',
            'arrival_date' => 'required'
            
        ]);

        //generate random number
        $ref_id = uniqid();
        $item_array = array();
        $amount_array = array();
        $rejected_array = array();
        $dimension_array = array();

        $item_array = $request->input('item_id');
        $amount_array = $request->input('amount');
        $rejected_array = $request->input('rejected_amount');
        $dimension_array = $request->input('dimension');
        $size = sizeof($item_array);
        
        for($x = 0;$x < $size;$x++){
            $purchasing = new Purchasing;
            $purchasing->item_id = $item_array[$x];
            $purchasing->amount = $amount_array[$x];
            $purchasing->rejected_amount = $rejected_array[$x];
            $purchasing->dimension = $dimension_array[$x];
            $purchasing->sender_pic = $request->input('sender_pic');
            $purchasing->arrival_date = $request->input('arrival_date');
            $purchasing->reference_id = $ref_id;
            $purchasing->save();
        }
        $ref_id = str_random(5);
        
        
        return redirect('purchasings')->with('success','Data has been inputted');
    }

    public function show($reference_id){
    
        $purchasings = Purchasing::where('reference_id',$reference_id)->where('deleted_at',NULL)->get();
        $dummy = Purchasing::where('reference_id',$reference_id)->where('deleted_at',NULL)->first();
        $arrival_date = $dummy->arrival_date;
        $sender_pic = $dummy->sender_pic;
        if($purchasings != NULL){
            return view('Purchasing.show')->with('purchasings',$purchasings)->with('arrival_date',$arrival_date)->with('sender_pic',$sender_pic)->with('reference_id',$reference_id);
        }
        else{
            return redirect('purchasings')->with('error','Data not found');
        }
    }
    
    public function edit($id){
        $purchasings = Purchasing::where('ref_id',$ref_id)->where('deleted_at',NULL)->get();
        if($purchasings != NULL){
            return view('Purchasing.edit')->with('purchasings',$purchasings);
        }
        else{
            return redirect('purchasings')->with('error','Data not found');
        }
    }

    public function update(Request $request, $ref_id){
        $this->validate($request,[
            'item_name' => 'required',
            'expected_amount' => 'required',
            'real_amount' => 'required',
            'sender' => 'required',
            'date' => 'required'
        ]);
            
            
        $item_array = array();
        $item_array = $request->input('item_name');
        $counter = 0;
    
        $purchasings = Purchasing::where('ref_id',$ref_id)->where('deleted_at',NULL)->get();
        foreach($purchasings as $purchasing){
            $purchasing->item_name = $item_array[$counter];
            $purchasing->expected_amount = $request->input('expected_amount');
            $purchasing->real_amount = $request->input('real_amount');
            $purchasing->sender = $request->input('sender');
            $purchasing->date = $request->input('date');
            $purchasing->ref_id = $ref_id;
            $purchasing->save();
            $counter++;
        }
            // for($counter = 0;$counter < sizeof($item_array);$counter ++){
            //     $purchasing->item_name = $item_array[$counter];
            //     $purchasing->expected_amount = $request->input('expected_amount');
            //     $purchasing->real_amount = $request->input('real_amount');
            //     $purchasing->sender = $request->input('sender');
            //     $purchasing->date = $request->input('date');
            //     $purchasing->ref_id = $ref_id;
            //     $purchasing->save();
            // }
    
        return redirect('purchasings')->with('success','Data has been inputted');
    }

    public function destroy($reference_id){
        $purchasings = Purchasing::where('reference_id',$reference_id)->get();
        $date = date('Y-m-d H:i:s');
        foreach($purchasings as $purchasing){
            $purchasing->deleted_at = $date;
            $purchasing->save();
        }

        return redirect('purchasings')->with('success','Item Deleted');
    }
}
