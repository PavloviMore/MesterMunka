<?php
//?query=mertekegysegTabla

namespace queries;

class MertekegysegTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Mértékegység";
        $this->sql = "SELECT * FROM mertekegyseg";
        $this->columns = [
            "id" => "id",
            "egyseg" => "egység",
        ];
    }
}