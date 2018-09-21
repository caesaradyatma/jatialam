<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalokController extends Controller
{
    public function index(){
        return view('inventory.rawitem.index');
    }
}
