<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Fournisseur extends Model
{
    use HasFactory;
   public function getFournisseur(){
     $result=DB::table('Fournisseur')->get();
     return $result;
   }
   public function addFournisseur($data){
    $result=DB::table('Fournisseur')->insert($data);
    return $result;
  }
}
