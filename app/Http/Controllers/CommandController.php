<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommandController extends Controller
{
    public function getData3(){
        $commandeModel=new Commande();
        echo $commandeModel->getCommande();
    }
    public function addCommande(Request $request)
    {
        $num_commande = $request->input('num_commande');
        $service = $request->input('service');
        $type_command = $request->input('type_command');
        $date = $request->input('date');
        $fornisseur = $request->input('fornisseur');
        if (empty($num_commande)) {
            return response()->json(['message' => 'Le N°commande est requis'], 400);
        }
        $data = [
            'num_commande' => $num_commande,
            'service' => $service,
            'type_command' => $type_command,
            'date' => $date,
            'fornisseur' => $fornisseur,
        ];
    
        DB::table('Commande')->insert($data);
    
        return response()->json([
            'message' => 'Données reçues avec succès',
            'num_commande' => $num_commande,
            'service' => $service,
            'type_command' => $type_command,
            'date' => $date,
            'fornisseur' => $fornisseur
        ], 200);
    }

   function deletData(Request $req){
    $commandModel=new Commande();
    $id=$req->id;
    $commandModel->deletData($id);
   }
   public function deleteCommand($id)
   {
       // Find the record
       $command = Commande::find($id);
          
       if ($command) {
           // Delete the record
           $command->delete();

           // Return a response indicating success
           return response()->json(['message' => 'Record deleted successfully']);
       }

       // Return a response indicating failure or not found
       return response()->json(['message' => 'Record not found'], 404);
   }
   public function getCm($id)
    {
        $command = Commande::find($id);
        
        return response()->json($command);
    }
    public function updateCm(Request $request, $id)
{
  // Validez les données du formulaire de modification, effectuez les opérations de mise à jour, etc.
  $enregistrement = Commande::findOrFail($id);
  $enregistrement->update($request->all());

  return response()->json(['message' => 'Enregistrement mis à jour avec succès.']);
}
}
