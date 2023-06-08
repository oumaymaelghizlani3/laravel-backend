<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Demande extends Model
{
    use HasFactory;
    protected $table = 'Demande';
    protected $fillable = ['num_projet', 'type','titre','chef','statut','date_creat','date_valid','etude_tec','confirm','montant','acheteur','statut_a','observation','OI'];
    public $timestamps = false;
   public function getDemande(){
    $demande = DB::table('Demande')->get();
    return $demande;
}
}
