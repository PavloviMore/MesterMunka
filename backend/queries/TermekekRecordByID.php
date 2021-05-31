<?php
//?query=termekRecordByID&id=3

namespace queries;

class TermekekRecordByID extends \queries\ParentRekordById {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Keresés id szerint";
        $this->sql = "SELECT * FROM termek WHERE id = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["id"]];
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
