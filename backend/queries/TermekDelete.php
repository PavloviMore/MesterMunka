<?php
//POST
/*
    query=termekDelete
    termekId=21
*/

namespace queries;

class TermekDelete extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "DELETE FROM termek
                        WHERE id = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["termekId"]];
        $this->title = "Termék törlés";

    }

}