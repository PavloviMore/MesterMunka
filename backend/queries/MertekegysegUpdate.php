<?php
//POST
/*
    query=mertekegysegUpdate
    egyseg=tekercs
    id=4
*/

namespace queries;

class MertekegysegUpdate extends \queries\ParentUpdate{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Mértékegység update";
        $this->sql = "UPDATE mertekegyseg SET 
                    egyseg = ?
                    WHERE id = ?";
        $this->typesString = "si";
        $this->paramVariables = [
            $params["egyseg"],
            $params["id"],
        ];
    }
}