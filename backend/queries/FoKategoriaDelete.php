<?php
//POST
/*
    query=foKategoriaDelete
    fokategoriaID=4
*/

namespace queries;

class FoKategoriaDelete extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "DELETE from fokategoria where id = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["id"]];
        $this->title = "FőKategoria törlés";

    }

}