<?php 
namespace App\Entity;

class Dice {
public function randomDice(){
    $randomDice = (rand(1,6));
    echo "Vous lancez un dé, il tombe sur la face ".$randomDice;
}



}


// $dice = new Dice();
// $dice->randomDice();




?>