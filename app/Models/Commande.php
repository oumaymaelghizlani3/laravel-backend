<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Commande extends Model
{
    use HasFactory;
    protected $table = 'Commande';
    protected $fillable = ['num_commande', 'service', 'type_command', 'date', 'fornisseur'];
    public $timestamps = false;
   public function getCommande(){
    $commandes = DB::table('Commande')->get();
    return $commandes;
}
}
