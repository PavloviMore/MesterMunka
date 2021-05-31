<?php
//?query=autokTabla

namespace queries;

class HarmadlagosKategoriaTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Harmadlagos kategoriák";
        $this->sql = "SELECT * FROM harmadlagoskategoria";
        $this->columns = [
            "id" => "HarmadlagosKategoriaID",
            "masodlagoskategoriaID" => "MásodlagosKategoriaID",
            "harmadlagosKategoriaNev" => "KategoriánakNeve",
        ];
    }
}