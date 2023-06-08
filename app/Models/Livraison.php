<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Livraison extends Model
{
    use HasFactory;
    protected $table = 'Livraison';
    protected $fillable = ['num_livraison','num_commande', 'fournisseur', 'service', 'date','quantite','prix'];
    public $timestamps = false;
   public function getLivraison(){
    $livraison = DB::table('Livraison')->get();
    return $livraison;
}
}
