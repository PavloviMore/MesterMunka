<?php
//POST
/*
    query=masodlagosKategoriaDelete
    id=5
*/

namespace queries;

class MasodlagosKategoriaDelete extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "DELETE FROM masodlagoskategoria
                        WHERE id = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["id"]];
        $this->title = "masodlagoskategoria törlés";

    }

}