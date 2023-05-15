<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function getData1(){
        $fournisseurModel=new Fournisseur();
        echo $fournisseurModel->getFournisseur();
    }
    public function addData1(Requeste $req){
        $fournisseurModel=new Fournisseur();
        $result= $fournisseurModel->addFournisseur($req->all());
    }
}
