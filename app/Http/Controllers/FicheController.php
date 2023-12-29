<?php

namespace App\Http\Controllers;

use App\Models\Fiche;
use Illuminate\Http\Request;
// use App\Http\Controllers\SignatureDelegueBox;
// use App\Http\Controllers\SignatureProfBox;


class ficheController extends Controller {

    public function enregistrerFiche(Request $request) {
        // Validez les données du formulaire
        $request->validate([
            'semestre' => 'required',
            'date' => 'required',
            'codeCours' => 'required',
            'enseignant' => 'required',
            'heureDebut' => 'required',
            'heureFin' => 'required',
            'salle' => 'required',
            'typeSeance' => 'required',
            'titreSeance' => 'required',
            'contenu' => 'required',
            'confidentialite' => 'accepted',
        ]);

        // Créez une nouvelle instance du modèle Fiche
        $fiche = new Fiche();

        // Attribuez les valeurs des champs du formulaire à l'instance de Fiche
        $fiche->semestre = $request->input('semestre');
        $fiche->date = $request->input('date');
        $fiche->codeCours = $request->input('codeCours');
        $fiche->enseignant = $request->input('enseignant');
        $fiche->heureDebut = $request->input('heureDebut');
        $fiche->heureFin = $request->input('heureFin');
        $fiche->salle = $request->input('salle');
        $fiche->typeSeance = $request->input('typeSeance');
        $fiche->titreSeance = $request->input('titreSeance');
        $fiche->contenu = $request->input('contenu');
        $fiche->confidentialite = true;


        // Sauvegarder les signatures
        // Sauvegarder les signatures
        // $fiche->signatureDelegue = $this->saveSignature(new SignatureDelegueBox(), 'signatureDelegueBox');
        // $fiche->signatureProf = $this->saveSignature(new SignatureProfBox(), 'signatureProfBox');

        // Enregistrez la fiche dans la base de données
        toastr()->success("Sauvegarde Réussie !");
        $fiche->save();

    }



    public function showFiches() {
        // Récupérez toutes les fiches depuis la base de données
        $fiches = Fiche::all();

        // Passez les fiches à la vue
        return view('delegue.analytics', ['fiches' => $fiches]);
    }

    public function showFiche(Fiche $fiche) {
        // Vous pouvez personnaliser cette méthode pour afficher une vue spécifique
        return view('fiches.show', compact('fiche'));
    }

    public function editFiche(Fiche $fiche) {
        // Vous pouvez personnaliser cette méthode pour afficher le formulaire d'édition
        return view('fiches.edit', compact('fiche'));
    }

    public function updateFiche(Request $request, Fiche $fiche) {
        // Validez les données du formulaire de mise à jour si nécessaire
        // ...

        // Mettez à jour les champs de la fiche avec les nouvelles valeurs
        $fiche->update([
            'semestre' => $request->input('semestre'),
            'date' => $request->input('date'),
            'codeCours' => $request->input('codeCours'),
            // ... ajoutez d'autres champs ici
        ]);

        // Redirigez l'utilisateur vers la page de détails de la fiche
        return redirect()->route('fiches.show', $fiche->id)->with('success', 'Fiche mise à jour avec succès');
    }

    public function destroyFiche(Fiche $fiche) {
        // Supprimez la fiche de la base de données
        $fiche->delete();

        // Redirigez l'utilisateur vers la liste des fiches
        return redirect()->route('fiches.index')->with('success', 'Fiche supprimée avec succès');
    }
/*
    private function saveSignature($signatureBox, $signatureBoxId) {
        $dataUrl = $signatureBox->toDataURL();
        list($type, $data) = explode(';', $dataUrl);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);

        $filename = 'signature_' . time() . '.png';
        $path = public_path('signatures/' . $filename);

        file_put_contents($path, $data);

        return $filename;
    } */


}
