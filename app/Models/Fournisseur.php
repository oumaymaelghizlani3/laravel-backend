<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class Fournisseur extends Model
{
    use HasFactory;
    protected $table = 'Fournisseur';
    protected $fillable = ['nom', 'adresse', 'email', 'contrat', 'commande'];
    public $timestamps = false;
   public function getFournisseur(){
    $fournisseurs = DB::table('Fournisseur')->get();
    return $fournisseurs;
}

}
