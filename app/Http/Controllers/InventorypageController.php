<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventorypageController extends Controller
{
    public function pages() {
        return view('inventory.page');
    } 
}
