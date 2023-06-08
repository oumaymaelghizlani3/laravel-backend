<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Reception;

class ReceptionController extends Controller
{
    public function getData5(){
        $receptionModel=new Reception();
        echo $receptionModel->getReception();
    }
    public function addReception(Request $request)
    {
        $famille = $request->input('famille');
        $demandeur = $request->input('demandeur');
        $CG = $request->input('CG');
        $designation = $request->input('designation');
        $numCDE = $request->input('numCDE');
        $date = $request->input('date');
        $designation2 = $request->input('designation2');
        $fournisseur = $request->input('fournisseur');
        $montant = $request->input('montant');
        $montanteng = $request->input('montanteng');
        if (empty($numCDE)) {
            return response()->json(['message' => 'Le N° CDE est requis'], 400);
        }
        $data = [
            'famille' => $famille,
            'demandeur' => $demandeur,
            'CG' => $CG,
            'designation' => $designation,
            'numCDE' => $numCDE,
            'date' => $date,
            'designation2' => $designation2,
            'fournisseur' => $fournisseur,
            'montant' => $montant,
            'montanteng' => $montanteng,
        ];
    
        DB::table('Reception')->insert($data);
    
        return response()->json([
            'message' => 'Données reçues avec succès',
            'famille' => $famille,
            'demandeur' => $demandeur,
            'CG' => $CG,
            'designation' => $designation,
            'numCDE' => $numCDE,
            'date' => $date,
            'designation2' => $designation2,
            'fournisseur' => $fournisseur,
            'montant' => $montant,
            'montanteng' => $montanteng,
          
        ], 200);
    }

   function deletData(Request $req){
    $receptionModel=new Reception();
    $id=$req->id;
    $receptionModel->deletData($id);
   }
   public function deleteReception($id)
   {
       // Find the record
       $reception = Reception::find($id);
          
       if ($reception) {
           // Delete the record
           $reception->delete();

           // Return a response indicating success
           return response()->json(['message' => 'Record deleted successfully']);
       }

       // Return a response indicating failure or not found
       return response()->json(['message' => 'Record not found'], 404);
   }
   public function getRec($id)
    {
        $reception = Reception::find($id);
        
        return response()->json($reception);
    }
    public function updateRec(Request $request, $id)
{
  // Validez les données du formulaire de modification, effectuez les opérations de mise à jour, etc.
  $enregistrement = Reception::findOrFail($id);
  $enregistrement->update($request->all());

  return response()->json(['message' => 'Enregistrement mis à jour avec succès.']);
}
public function getReco($numCDE)
{
    $reception = Reception::where('numCDE', $numCDE)->first();
    
    return response()->json($reception);
}
}
