<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Code;

class CodeController extends Controller
{
    public function index() {
        return view('code.index');
    }

    public function dataShow(Request $request) {
    
        $this->validate($request,[
            'item_assembly' => 'required', 
        ]);

    $test = $request->input('test');
    $lists = Code::where('item_assembly', 'LIKE', '%'.$test.'%')->get();
   
    return view ('code.show')->with('lists', $lists);
    }
}
