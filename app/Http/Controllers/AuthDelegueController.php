<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AuthDelegueController extends Controller {

        public function login(Request $request) {
        //dd($request);

        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Votre logique d'authentification ici
        $credentials = $request->only('name', 'password');

        if (!Auth::attempt($credentials)) {
            toastr()->success("Connexion Reussie !");
            return view('delegue/accueil');
        }

        // L'authentification a échoué
        toastr()->error('Identifiants invalides !');
        return back()->withInput()->withErrors(['name' => 'Identifiants invalides']);

    }
}
