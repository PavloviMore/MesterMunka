<?php
//POST
/*
    query=fokategoriaUpdate
    foKategoriaNev=teszt_Kültér
    id=4
*/

namespace queries;

class FokategoriaUpdate extends \queries\ParentUpdate{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Főkategoria update";
        $this->sql = "UPDATE fokategoria SET
                        foKategoriaNev = ?
                        WHERE id = ?";
        $this->typesString = "si";
        $this->paramVariables = [
            $params["foKategoriaNev"],
            $params["id"],
        ];
    }
}