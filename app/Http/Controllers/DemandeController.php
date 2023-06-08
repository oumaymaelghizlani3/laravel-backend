<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DemandeController extends Controller
{
    public function getData6(){
        $demandeModel=new Demande();
        echo $demandeModel->getDemande();
    }
    public function addDemand(Request $request)
    {
        $num_projet = $request->input('num_projet');
        $type = $request->input('type');
        $type_command = $request->input('type_command');
        $titre = $request->input('titre');
        $chef = $request->input('chef');
        $statut = $request->input('statut');
        $date_créat = $request->input('date_creat');
        $date_valid = $request->input('date_valid');
        $etude_tec = $request->input('etude_tec');
        $confirm = $request->input('confirm');
        $montant = $request->input('montant');
        $acheteur = $request->input('acheteur');
        $statut_a = $request->input('statut_a');
        $observation = $request->input('observation');
        $OI = $request->input('OI');
        if (empty($num_projet)) {
            return response()->json(['message' => 'Le N°projet est requis'], 400);
        }
        $data = [
            'num_projet' => $num_projet,
            'type' => $type,
            'titre' => $titre,
            'chef' => $chef,
            'statut' => $statut,
            'date_creat' => $date_créat,
            'date_valid' => $date_valid,
            'etude_tec' => $etude_tec,
            'confirm' => $confirm,
            'montant' => $montant,
            'acheteur' => $acheteur,
            'statut_a' => $statut_a,
            'observation' => $observation,
            'OI' => $OI,
        ];
    
        DB::table('Demande')->insert($data);
    
        return response()->json([
            'num_projet' => $num_projet,
            'type' => $type,
            'titre' => $titre,
            'chef' => $chef,
            'statut' => $statut,
            'date_creat' => $date_créat,
            'date_valid' => $date_valid,
            'etude_tec' => $etude_tec,
            'confirm' => $confirm,
            'montant' => $montant,
            'acheteur' => $acheteur,
            'statut_a' => $statut_a,
            'observation' => $observation,
            'OI' => $OI
        ], 200);
    }

   function deletData(Request $req){
    $demandModel=new Demande();
    $id=$req->id;
    $demandModel->deletData($id);
   }
   public function deleteDemand($id)
   {
       // Find the record
       $demand = Demande::find($id);
          
       if ($demand) {
           // Delete the record
           $demand->delete();

           // Return a response indicating success
           return response()->json(['message' => 'Record deleted successfully']);
       }

       // Return a response indicating failure or not found
       return response()->json(['message' => 'Record not found'], 404);
   }
   public function getDm($id)
    {
        $demande = Demande::find($id);
        
        return response()->json($demande);
    }
    public function updateDm(Request $request, $id)
{
  // Validez les données du formulaire de modification, effectuez les opérations de mise à jour, etc.
  $enregistrement = Demande::findOrFail($id);
  $enregistrement->update($request->all());

  return response()->json(['message' => 'Enregistrement mis à jour avec succès.']);
}
}
