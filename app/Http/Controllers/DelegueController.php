<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DelegueController extends Controller {

    public function index() {
        return view('delegue.accueil');
    }
    
}
