<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Fiche;

class AnalyticsController extends Controller {


    public function index() {
        $fiches = $this->getFiches();

        return view('delegue.analytics');
    }

    private function getFiches()
    {
        // Récupérez toutes les fiches depuis la base de données
        return Fiche::all();
    }

}
