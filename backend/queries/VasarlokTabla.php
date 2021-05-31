<?php
//?query=vasarlokTabla

namespace queries;

class VasarlokTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Vásárlók";
        $this->sql = "SELECT * FROM vasarlo";
        $this->columns = [
            "id" => "vásárlóId",
            "vezetekNev" => "vezetékNév",
            "keresztNev" => "keresztNév",
            "utca" => "utca",
            "zip" => "zip",
            "varos" => "város",
            "email" => "email",
            "telefon" => "telefon",
            "jelszo" => "jelszó",
            "accessLevel" => "AccessLevel"
        ];
    }
}