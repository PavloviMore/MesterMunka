<?php
//POST
/*
    query=vasarloInsert
    vezetekNev=Tatár
    keresztNev=Tamás
    utca=liliom_ut_1
    zip=5584
    varos=Veszprém
    email=tatar.tamas@citromail.hu
    telefon=06202131156
*/
namespace queries;

class VasarloInsert extends \queries\ParentInsert {

    public function __construct($params){
        parent::__construct($params);
        $this->title = "Vásárló hozzáfűzés";
        $this->sql = "INSERT INTO vasarlo 
                    (vezetekNev,keresztNev,utca,zip,varos,email,telefon,jelszo,accessLevel)
                    VALUES
                    (?,?,?,?,?,?,?,?,?)";
        $this->typesString = "ssssssssi";
        $this->paramVariables = [
            $params["vezetekNev"],
            $params["keresztNev"],
            $params["utca"],
            $params["zip"],
            $params["varos"],
            $params["email"],
            $params["telefon"],
            $params["jelszo"],
            $params["accesslevel"],
        ];
    }
}