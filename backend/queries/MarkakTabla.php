<?php
//?query=markakTabla

namespace queries;

class MarkakTabla extends \queries\ParentTabla {
    public function __construct($params){
        parent::__construct($params);
        $this->title = "Márkák";
        $this->sql = "SELECT * FROM markak";
        $this->columns = [
            "id" => "MárkaID",
            "marka" => "MárkaNév",
        ];
    }
}