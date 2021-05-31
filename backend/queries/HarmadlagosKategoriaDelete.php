<?php
//POST
/*
    query=harmadlagosKategoriaDelete
    id=5
*/

namespace queries;

class HarmadlagosKategoriaDelete extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "DELETE FROM harmadlagoskategoria
                        WHERE id = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["id"]];
        $this->title = "HarmadlagosKategoriából törlés";

    }

}