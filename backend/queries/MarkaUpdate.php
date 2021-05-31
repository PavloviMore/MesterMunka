<?php
//POST
/*
    query=markaUpdate
    marka=Sámson
    id=4
*/

namespace queries;

class MarkaUpdate extends ParentUpdate{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "UPDATE markak SET 
                        marka = ?
                        WHERE id = ?";
        $this->typesString = "si";
        $this->title = "markak update";
        $this->paramVariables = [
            $params["marka"],
            $params["id"],
        ];
    }
}