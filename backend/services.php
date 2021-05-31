<?php
return [
    // Adatok Átírása 
    "termekUpdate" => function ($params){
        (new \queries\TermekUpdate($params))->render();
    },
    "mertekegysegUpdate" => function ($params){
        (new \queries\MertekegysegUpdate($params))->render();
    },
    "vasarloUpdate" => function ($params){
        (new \queries\VasarloUpdate($params))->render();
    },
    "markaUpdate" => function ($params){
        (new \queries\MarkaUpdate($params))->render();
    },
    "fokategoriaUpdate" => function ($params){
        (new \queries\FoKategoriaUpdate($params))->render();
    },
    "masodlagoskategoriaUpdate" => function ($params){
        (new \queries\MasodlagosKategoriaUpdate($params))->render();
    },
    "harmadlagoskategoriaUpdate" => function ($params){
        (new \queries\HarmadlagosKategoriaUpdate($params))->render();
    },
    //------------------------------------------------------



    // Adatok törlése
    "markaDelete" => function ($params){
        (new \queries\MarkaDelete($params))->render();
    },
    "termekDelete" => function ($params){
        (new \queries\TermekDelete($params))->render();
    },
    "mertekegysegDelete" => function ($params){
        (new \queries\MertekegysegDelete($params))->render();
    },
    "vasarloDelete" => function ($params){
        (new \queries\vasarloDelete($params))->render();
    },
    "foKategoriaDelete" => function ($params){
        (new \queries\foKategoriaDelete($params))->render();
    },
    "masodlagosKategoriaDelete" => function ($params){
        (new \queries\MasodlagosKategoriaDelete($params))->render();
    },
    "harmadlagosKategoriaDelete" => function ($params){
        (new \queries\HarmadlagosKategoriaDelete($params))->render();
    },
    //-------------------------------------------------------



    // Táblák feltöltése
    "markaInsert" => function ($params){
        (new \queries\MarkaInsert($params))->render();
    },
    "mertekegysegInsert" => function ($params){
        (new \queries\MertekegysegInsert($params))->render();
    },
    "vasarloInsert" => function ($params){
        (new \queries\VasarloInsert($params))->render();
    },
    "termekInsert" => function ($params){
        (new \queries\TermekInsert($params))->render();
    },
    "foKategoriaInsert" => function ($params){
        (new \queries\FoKategoriaInsert($params))->render();
    },
    "masodlagosKategoriaInsert" => function ($params){
        (new \queries\MasodlagosKategoriaInsert($params))->render();
    },
    "harmadlagosKategoriaInsert" => function ($params){
        (new \queries\HarmadlagosKategoriaInsert($params))->render();
    },
    //-------------------------------------------------------


    // Tábla lekérdezek 
    "markakTabla" => function ($params){
        (new \queries\MarkakTabla($params))->render();
    },
    "tulajdonsagokTabla" => function ($params){
        (new \queries\TulajdonsagokTabla($params))->render();
    },
    "vasarlokTabla" => function ($params){
        (new \queries\VasarlokTabla($params))->render();
    },
    "mertekegysegTabla" => function ($params){
        (new \queries\MertekegysegTabla($params))->render();
    },
    "termekekTabla" => function ($params){
        (new \queries\TermekekTabla($params))->render();
    },
    "foKategoriaTabla" => function ($params){
        (new \queries\FoKategoriaTabla($params))->render();
    },
    "masodlagosKategoriaTabla" => function ($params){
        (new \queries\MasodlagosKategoriaTabla($params))->render();
    },
    "harmadlagosKategoriaTabla" => function ($params){
        (new \queries\HarmadlagosKategoriaTabla($params))->render();
    },
    //--------------------------------------------------------

    // Adat keresés név alapján 
    "termekRecordByFilter" => function ($params){
        (new \queries\TermekekRecordByFilter($params))->render();
    },
    "termekRecordByID" => function ($params){
        (new \queries\TermekekRecordByID($params))->render();
    },
    // ----------------------------------------------------

    "paramsError" => function ($params){
        (new \core\ParamsError($params))->render();
    },
    "loginUser" => function ($params){
        (new \queries\LoginUser($params))->login();
    },
    "logoutUser" => function ($params){
        (new \queries\LogoutUser($params))->logout();
    },
    "getUser" => function ($params){
        (new \queries\GetUser($params))->getUser();
    }
];