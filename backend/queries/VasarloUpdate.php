<?php
//POST
/*
    query=vasarloUpdate
    id=2
    vezetekNev=Szabo
    keresztNev=Ilona
    utca=vörösmarty_út
    zip=2256
    varos=tápitószele
    email=szabo.ilona@gmail.com
    telefon=06305488060
    id=5
*/

namespace queries;

class VasarloUpdate extends \queries\ParentUpdate{

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Vasárló átírva";
        $this->sql = "UPDATE vasarlo SET 
                        vezetekNev=?,
                        keresztNev=?,
                        utca=?,
                        zip=?,
                        varos=?,
                        email=?,
                        telefon=?,
                        jelszo = ?,
                        accessLevel = ?
                        WHERE id = ?";
        $this->typesString = "ssssssssii";
        $this->paramVariables = [
            $params["vezetekNev"],
            $params["keresztNev"],
            $params["utca"],
            $params["zip"],
            $params["varos"],
            $params["email"],
            $params["telefon"],
            $params["jelszo"],
            $params["AccessLevel"],
            $params["id"]
        ];

    }

}