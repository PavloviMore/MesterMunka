<?php
//?query=masodlagosKategoriaTabla

namespace queries;

class MasodlagosKategoriaTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "MásodlagosKategorák";
        $this->sql = "SELECT * FROM masodlagoskategoria";
        $this->columns = [
            "id" => "TermékID",
            "foKategoriaID" => "FőkategoriaID",
            "masodlagosKategoriaNev" => "KategoriaNév",
        ];
    }
}