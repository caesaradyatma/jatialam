<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssemblyController extends Controller
{
   public function index() {
       return view('assembly.index');
   }
}
