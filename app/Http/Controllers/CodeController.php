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
    

    $test = $request->input('test');
    if($test != NULL) {
        $lists = Code::where('item_assembly', 'LIKE', '%'.$test.'%')->get();
        return view ('code.show')->with('lists', $lists);
    } else {
        $test = 0;
        $lists = Code::where('item_assembly', 'LIKE', '%'.$test.'%')->get();
        return view ('code.show')->with('lists', $lists);
    }

  
    }
}
