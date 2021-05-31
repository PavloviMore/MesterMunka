<?php
//POST
/*
    query=termekInsert
    termekNev=ProbaTermek
    egysegArNetto=5000
    leiras=lorem
    kategoria=2
    AFA=27
    mertekegysegID=2
    raktarKeszlet=5
    foto=foto
    markaID=3
*/
namespace queries;

class TermekInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "termék hozzáfűzés";
        $this->sql = "INSERT INTO termek
                        (termekNev,egysegArNetto,leiras,kategoria,mertekegysegID,raktarKeszlet,foto,markaID)
                        VALUE
                        (?,?,?,?,?,?,?,?)";
        $this->typesString = "sisiiisi";
        $this->paramVariables = [
            $params["termekNev"],
            $params["egysegArNetto"],
            $params["leiras"],
            $params["kategoria"],
            $params["mertekegysegID"],
            $params["raktarKeszlet"],
            $params["foto"],
            $params["markaID"]
        ];
    }
}