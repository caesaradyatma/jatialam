<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchasing;

class PurchasingsController extends Controller
{
    public function index(){
        $purchasings = Purchasing::where('deleted_at',NULL)->paginate(10);
        return veiw('Purchasing.index')->with('purchasings',$purchasings);
    }

    public function create(){
        return view('Purchasing.create');
    }

    public function store(Request $request){
    
            $this->validate($request,[
                'item_name' => 'required',
                'expected_amount' => 'required',
                'real_amount' => 'required',
                'sender' => 'required',
                'date' => 'date'
            ]);
            
            $ref_id = 0;
            $item_array = array();
            $item_array = $request->input('item_name');
    
            
            for($counter = 0;$counter < sizeof($item_array);$counter ++){
                $purchasing = new Purchasing;
                $purchasing->item_name = $item_array[$counter];
                $purchasing->expected_amount = $request->input('expected_amount');
                $purchasing->real_amount = $request->input('real_amount');
                $purchasing->sender = $request->input('sender');
                $purchasing->date = $request->input('date');
                $purchasing->ref_id = $ref_id;
                $purchasing->save();
            }
    
            return redirect('purchasings')->with('success','Data has been inputted');
    }
    public function show($ref_id){
    
        $purchasings = Purchasing::where('ref_id',$ref_id)->where('deleted_at',NULL)->get();
        if($purchasings != NULL){
            return view('Purchasing.show')->with('purchasings',$purchasings);
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
                'date' => 'date'
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

    public function destroy($ref_id){
        $purchasings = Purchasing::where('ref_id',$ref_id)->get();
        $date = ('Y-m-d');
        foreach($purchasings as $purchasing){
            $purchasing->deleted_at = $date;
            $purchasing->save();
        }

        return redirect('purchasings')->with('success','Item Deleted');
    }
}
