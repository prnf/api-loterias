<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Util;

class Loteria extends Model
{
    public function getJson(){
        //Verifica se o ultimo resultado foi gerado 12 horas antes de fazer uma nova solicitação
        if(!$this->resultExpired()){
            return $this->json;
        }

        //Tenta usar o ultimo link gerado
        $json = Util::getJsonFromLink($this->link);
        
        //Se o json não for válido gera um novo link
        if(Util::jsonIsValid($json)){
            $link = Util::generateLink($this->nome);
            $json = Util::getJsonFromLink($link);
            $this->link = $link;
        }

        $this->json = $json;
        $this->save();
        return $json;
    }

    public function resultExpired(){
        if(strtotime($this->updated_at) < strtotime('-12 hours')){
            return true;
        }
        return false;
    }

}
