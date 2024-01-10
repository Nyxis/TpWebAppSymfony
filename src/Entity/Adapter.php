<?php
namespace App\Entity;

interface Adapter {
    public function flip();
    
}

class Deck implements Adapter{
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
class DeckCoinAdapter implements Adapter{
 public function flip(){
    $result = (rand(1,2));
     if ($result === 1) {
        echo "Vous lancez une pièce de monnaie, elle tombe sur pile"."\n";
     }
     if ($result === 2) {
        echo "Vous lancez une pièce de monnaie, elle tombe sur face"."\n";
     }
 }
}
class DeckDiceAdapter implements Adapter {
 public function flip(){
    echo "Vous lancez un dé, il tombe sur la face " . rand(1,6);
 }
}

 $deck = new Deck();
 $deckCoinAdapter = new DeckCoinAdapter();
 $deckDiceAdapter = new DeckDiceAdapter();
 $deck->flip();
 $deckCoinAdapter->flip();
 $deckDiceAdapter->flip();


?>