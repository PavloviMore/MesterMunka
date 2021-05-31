<?php
//POST
/*
    query=termekUpdate
    termekNev=ProbaTermek
    egysegArNetto=5000
    leiras=lorem
    kategoria=2
    AFA=27
    mertekegysegID=2
    raktarKeszlet=5
    foto=foto
    markaID=3
    id=23
*/
namespace queries;

class TermekUpdate extends \queries\ParentUpdate {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "termék hozzáfűzés";
        $this->sql = "UPDATE termek SET
                        termekNev = ?,
                        egysegArNetto = ?,
                        leiras = ?,
                        kategoria = ?,
                        mertekegysegID = ?,
                        raktarKeszlet = ?,
                        foto = ?,
                        markaID = ?
                        WHERE id = ?";
        $this->typesString = "sisiiisii";
        $this->paramVariables = [
            $params["termekNev"],
            $params["egysegArNetto"],
            $params["leiras"],
            $params["kategoria"],
            $params["mertekegysegID"],
            $params["raktarKeszlet"],
            $params["foto"],
            $params["markaID"],
            $params["id"],
        ];
        
    }
}