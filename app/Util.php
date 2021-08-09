<?php

namespace App;

use Illuminate\Support\Facades\Http;

class Util
{
    public static $baseUrl = "http://loterias.caixa.gov.br";

    public static function generateLink($nomeJogo){
        $url = self::$baseUrl."/wps/portal/loterias/landing/".$nomeJogo."/";
        $html = Http::get($url);

        $doc = new \DOMDocument;
        $doc->validateOnParse = false;
        @$doc->LoadHtml($html);
        $element1 = $doc->getElementById('com.ibm.lotus.NavStateUrl');
        $urlPart1 = $element1->getAttribute('href');
        $element2 = $doc->getElementById('urlBuscarResultado');
        $urlPart2 = $element2->getAttribute('value');
        $urlFinal = self::$baseUrl.$urlPart1.$urlPart2;
        return $urlFinal;
    }

    public static function getJsonFromLink($url){
        $json = Http::get($url);
        return $json;
    }

    public static function jsonIsValid($strJson){
        if(!json_decode($strJson)){
            return false;
        }
        return true;
    }

    
}
