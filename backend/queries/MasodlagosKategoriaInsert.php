<?php
//POST
/*
    query=masodlagosKategoriaInsert
    foKategoriaID=7
    masodlagosKategoriaNev=probaKategoria
*/
namespace queries;

class MasodlagosKategoriaInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "masodlagoskategoria hozzáfűzés";
        $this->sql = "INSERT INTO masodlagoskategoria
                        (foKategoriaID,masodlagosKategoriaNev)
                        VALUE
                        (?,?)";
        $this->typesString = "is";
        $this->paramVariables = [
            $params["foKategoriaID"],
            $params["masodlagosKategoriaNev"],
        ];
    }
}