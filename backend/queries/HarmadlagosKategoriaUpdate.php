<?php
//POST
/*
    query=harmadlagoskategoriaUpdate
    masodlagoskategoriaID=
    harmadlagosKategoriaNev=teszt_harmadlagosKategoria_Update
    id=4
*/

namespace queries;

class HarmadlagosKategoriaUpdate extends ParentUpdate{

    public function __construct($params){
        parent::__construct($params);
        $this->sql = "UPDATE harmadlagoskategoria SET 
                        masodlagoskategoriaID = ?,harmadlagosKategoriaNev = ?
                        WHERE id = ?";
        $this->typesString = "isi";
        $this->title = "harmadlagoskategoria update";
        $this->paramVariables = [
            $params["masodlagoskategoriaID"],
            $params["harmadlagosKategoriaNev"],
            $params["id"],

        ];
    }
}