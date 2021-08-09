<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loteria;

class ApiController extends Controller
{
    public function getResult(Request $request, $nomeJogo){
        $loteria = Loteria::where('nome', $nomeJogo)->first();
        if(empty($loteria)){
            return response()->json("Jogo não localizado", 400);
        }
        $json = $loteria->getJson();
        return response($json);
    }
}
