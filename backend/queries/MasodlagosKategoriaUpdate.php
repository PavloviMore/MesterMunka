<?php
//POST
/*
    query=masodlagoskategoriaUpdate
    foKategoriaID=2
    foKategoriaNev=dikSzoszi
    id=4
*/

namespace queries;

class MasodlagosKategoriaUpdate extends ParentUpdate{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "UPDATE masodlagoskategoria SET
                        foKategoriaID = ?,
                        masodlagosKategoriaNev = ?
                        WHERE id = ?";
        $this->typesString = "isi";
        $this->title = "Masodlagos kategoria update";
        $this->paramVariables = [
            $params["foKategoriaID"],
            $params["masodlagosKategoriaNev"],
            $params["id"],
        ];
    }
}