<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Livraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LivraisonController extends Controller
{
    public function getData4(){
        $commandeModel=new Livraison();
        echo $commandeModel->getLivraison();
    }
    public function addLivraison(Request $request)
    {
        $num_livraison = $request->input('num_livraison');
        $fournisseur = $request->input('fournisseur');
        $service = $request->input('service');
        $date = $request->input('date');
        $num_commande = $request->input('num_commande');
        $quantite = $request->input('quantite');
        $prix = $request->input('prix');
        if (empty($num_commande)) {
            return response()->json(['message' => 'Le N°commande est requis'], 400);
        }
        $data = [
            'num_livraison' => $num_livraison,
            'fournisseur' => $fournisseur,
            'service' => $service,
            'date' => $date,
            'num_commande' => $num_commande,
            'quantite' => $quantite,
            'prix' => $prix,
           
        ];
    
        DB::table('Livraison')->insert($data);
    
        return response()->json([
            'message' => 'Données reçues avec succès',
            'num_livraison' => $num_livraison,
            'fournisseur' => $fournisseur,
            'service' => $service,
            'date' => $date,
            'num_commande' => $num_commande,
            'quantite' => $quantite,
            'prix' => $prix,
          
        ], 200);
    }

   function deletData(Request $req){
    $livraisonModel=new Livraison();
    $id=$req->id;
    $livraisonModel->deletData($id);
   }
   public function deleteLivraison($id)
   {
       // Find the record
       $livraison = Livraison::find($id);
          
       if ($livraison) {
           // Delete the record
           $livraison->delete();

           // Return a response indicating success
           return response()->json(['message' => 'Record deleted successfully']);
       }

       // Return a response indicating failure or not found
       return response()->json(['message' => 'Record not found'], 404);
   }
   public function getLiv($id)
    {
        $livraison = Livraison::find($id);
        
        return response()->json($livraison);
    }
    public function getLivo($num_commande)
    {
        $livraison = Livraison::where('num_commande', $num_commande)->first();
        
        return response()->json($livraison);
    }
    public function updateLiv(Request $request, $id)
{
  // Validez les données du formulaire de modification, effectuez les opérations de mise à jour, etc.
  $enregistrement = Livraison::findOrFail($id);
  $enregistrement->update($request->all());

  return response()->json(['message' => 'Enregistrement mis à jour avec succès.']);
}
}
