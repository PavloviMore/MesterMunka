<?php
//?query=autokTabla

namespace queries;

class TermekekTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Termékek";
        $this->sql = "SELECT * FROM termek";
        $this->columns = [
            "id" => "TermékID",
            "nev" => "TermékNeve",
            "egysegArNetto" => "egysegArNetto",
            "leiras" => "Leírás",
            "kategoria3" => "Kategoria",
            "mertekegysegID" => "mértékegységID",
            "raktarKeszlet" => "raktárkészleten",
            "foto" => "Foto",
            "markaID" => "márka",
        ];
    }
}