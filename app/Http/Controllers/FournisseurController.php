<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FournisseurController extends Controller
{
    public function getData1(){
        $fournisseurModel=new Fournisseur();
        echo $fournisseurModel->getFournisseur();
    }
    public function addFournisseur(Request $request)
    {
        $nom = $request->input('nom');
        $email = $request->input('email');
        $adresse = $request->input('adresse');
        $commande = $request->input('commande');
        $contrat = $request->input('contrat');
        if (empty($nom)) {
            return response()->json(['message' => 'Le nom est requis'], 400);
        }
        $data = [
            'nom' => $nom,
            'email' => $email,
            'adresse' => $adresse,
            'commande' => $commande,
            'contrat' => $contrat,
        ];
    
        DB::table('Fournisseur')->insert($data);
    
        return response()->json([
            'message' => 'Données reçues avec succès',
            'nom' => $nom,
            'email' => $email,
            'adresse' => $adresse,
            'commande' => $commande,
            'contrat' => $contrat
        ], 200);
    }

   function deletData(Request $req){
    $fournisseurModel=new Fournisseur();
    $id=$req->id;
    $fournisseurModel->deletData($id);
   }
   public function deleteFournisseur($id)
   {
       // Find the record
       $fournisseur = Fournisseur::find($id);
          
       if ($fournisseur) {
           // Delete the record
           $fournisseur->delete();

           // Return a response indicating success
           return response()->json(['message' => 'Record deleted successfully']);
       }

       // Return a response indicating failure or not found
       return response()->json(['message' => 'Record not found'], 404);
   }
   public function get($id)
    {
        $fournisseur = Fournisseur::find($id);
        
        return response()->json($fournisseur);
    }
    public function update(Request $request, $id)
{
  // Validez les données du formulaire de modification, effectuez les opérations de mise à jour, etc.
  $enregistrement = Fournisseur::findOrFail($id);
  $enregistrement->update($request->all());

  return response()->json(['message' => 'Enregistrement mis à jour avec succès.']);
}
}