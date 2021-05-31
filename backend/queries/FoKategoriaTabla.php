<?php
//?query=foKategoriaTabla

namespace queries;

class FoKategoriaTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Termékek";
        $this->sql = "SELECT * FROM fokategoria";
        $this->columns = [
            "id" => "KategoriaID",
            "foKategoriaNev" => "FőkategoriaNév",
        ];
    }
}