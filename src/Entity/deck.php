<?php
namespace App\Entity;
class Deck{
    public function flip() {
    $randomCard = (rand(1,13));
    if ($randomCard === 1) {
        
    echo "Vous tirez une carte : As de" ;
   
    }elseif($randomCard === 11){
        echo "Vous tirez une carte : Vallet de";
    }elseif($randomCard === 12){
        echo "Vous tirez une carte : Reine de";
    }elseif($randomCard === 13){
        echo "Vous tirez une carte : Roi de";
    }else{
    echo "Vous tirez une carte : " . $randomCard ;}
 
 
    $randomType = (rand(1,4));
     
    if ($randomType === 1) {
        echo " coeur"."\n";
    }
    if ($randomType === 2) {
        echo " pique"."\n";
    }
    if ($randomType === 3) {
        echo " carreau"."\n";
    }
    if ($randomType === 4) {
        echo " trèfle"."\n";
    }

      }
}
// $deck = new Deck();
// $deck->flip();
?>