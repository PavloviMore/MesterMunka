<?php
//POST
/*
    query=mertekegysegDelete
    mertekegysegID=4
*/

namespace queries;

class MertekegysegDelete extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "DELETE FROM mertekegyseg
                        WHERE id = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["id"]];
        $this->title = "mértékegység törlés";
    }

}