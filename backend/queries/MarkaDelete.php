<?php
//POST
/*
    query=markaDelete
    id=5
*/

namespace queries;

class MarkaDelete extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "DELETE FROM markak
                        WHERE id = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["id"]];
        $this->title = "Márka törlés";

    }

}