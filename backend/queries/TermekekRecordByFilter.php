<?php
//?query=termekRecordByNev&termekNev=3

namespace queries;

class TermekekRecordByFilter extends \queries\ParentRekordById {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Keresés név szerint";
        $this->sql = "select * from termek t
                where termekNev like ? and
                if(? > 0,egysegArNetto > ?, true) and
                if(?> 0, markaID = ?, TRUE)
        ";
        $this->typesString = "siiii";
        $this->paramVariables = [
            '%'.$params["termekNev"].'%',
            $params["egysegArNetto"],
            $params["egysegArNetto"],
            $params["markaID"],
            $params["markaID"]
        ];
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
