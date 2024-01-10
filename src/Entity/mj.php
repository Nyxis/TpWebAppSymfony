<?php 
namespace App\Entity;

class Mj {
   public $name;

function __construct($name)
{
    $this->name = $name;
}

public function name(){
    return $this->name;
}
}


// $mj = New MJ("Mickael");
// echo $mj->name();

?>