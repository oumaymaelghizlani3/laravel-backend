<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Reception extends Model
{
    use HasFactory;
    protected $table = 'Reception';
    protected $fillable = ['famille', 'demandeur', 'CG', 'designation','numCDE','date','designation2','fournisseur','montant','montanteng'];
    public $timestamps = false;
   public function getReception(){
    $reception = DB::table('Reception')->get();
    return $reception;
}
}
