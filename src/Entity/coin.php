<?php 
namespace App\Entity;
class Coin {
    public $pile;
    public $face;
    function __construct($pile,$face)
    {
        $this->pile = $pile;
        $this->face = $face;
       
    }
    public function pile()
    {
        return $this->pile;
       
    }
    
    public function face()
    {
        return $this->face;
    }
    
} 
// $coin= new Coin(1,2);
//  $result = rand($coin->pile(),$coin->face());
//  if ($result== 1) {
//     echo "pile";
//  }
//  if ($result == 2) {
//     echo "face";
//  }




?>