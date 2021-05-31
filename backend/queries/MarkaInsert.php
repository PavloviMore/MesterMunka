<?php
//POST
/*
    query=markakinsert
    marka=sony
*/
namespace queries;

class MarkaInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "marka hozzáfűzés";
        $this->sql = "INSERT INTO markak 
                        (marka)
                        VALUES
                        (?)";
        $this->typesString = "s";
        $this->paramVariables = [
            $params["marka"],
        ];
    }
}