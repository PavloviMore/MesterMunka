<?php
//POST
/*
    query=mertekegysegInsert
    egyseg=pack
*/
namespace queries;

class MertekegysegInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "mértékegység hozzáfűzés";
        $this->sql = "INSERT INTO mertekegyseg
                        (egyseg)
                        VALUE
                        (?)";
        $this->typesString = "s";
        $this->paramVariables = [
            $params["egyseg"],
        ];
    }
}