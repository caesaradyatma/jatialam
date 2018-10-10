<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdjustmentinvController extends Controller
{
    public function index() {
        return view('adjustment.index');
    }

    public function create() {
        return view('adjustment.create');
    }
}
