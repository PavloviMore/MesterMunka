<?php
//?query=tulajdonsagokTabla

namespace queries;

class TulajdonsagokTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Márkák";
        $this->sql = "SELECT * from tulajdonsagok";
        $this->columns = [
            "szekhely" => "Székhely",
            "utca" => "utca",
            "varos" => "város",
            "zip" => "irányitóSzám",
            "AFA" => "Áfa",
            "telefon" => "Telefonszám",
            "email" => "email",
            "facebook" => "facebookLink",
            "adoszam" => "adószám",
        ];
    }
}