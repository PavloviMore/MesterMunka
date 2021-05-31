<?php
//POST
/*
    query=foKategoriaInsert
    foKategoriaNev=Barkács
*/
namespace queries;

class FoKategoriaInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Főkategória hozzáfűzés";
        $this->sql = "INSERT INTO fokategoria
                        (foKategoriaNev)
                        VALUE
                        (?)";
        $this->typesString = "s";
        $this->paramVariables = [
            $params["foKategoriaNev"],
        ];
    }
}