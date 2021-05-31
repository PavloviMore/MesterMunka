<?php
//POST
/*
    query=harmadlagosKategoriaInsert
    masodlagoskategoriaID=3
    harmadlagosKategoriaNev=Procceszor
*/
namespace queries;

class HarmadlagosKategoriaInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "harmadlagosaktegoria hozzáfűzés";
        $this->sql = "INSERT INTO harmadlagoskategoria
                        (masodlagoskategoriaID,harmadlagosKategoriaNev)
                        VALUE
                        (?,?)";
        $this->typesString = "is";
        $this->paramVariables = [
            $params["masodlagoskategoriaID"],
            $params["harmadlagosKategoriaNev"],
        ];
    }
}