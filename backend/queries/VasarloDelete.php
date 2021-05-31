<?php
//POST
/*
    query=vasarloDelete
    id=5
*/

namespace queries;

class VasarloDelete extends \queries\ParentDelete{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "DELETE FROM vasarlo
                        WHERE id = ?";
        $this->typesString = "i";
        $this->paramVariables = [$params["id"]];
        $this->title = "vásárló törölve";

    }

}