<?php

namespace Entity;

class Mj
 {
    protected array $dice;
    protected Coin $coin;
    protected deck $deck;
    public function __construct(array $deck, array $coins, array $dice) {
        $this->deck = $deck;
        $this->coin = $coins;
        $this->dice = $dice;
    }

    public function getDeck() {
        $randomizableDeck = new DeckAdapter
        ($this->deck[array_rand($this->deck)]);
        return $randomizableDeck;
    }

    public function getCoin() {
        return $this->coin[array_rand($this->coin)];
    }

    public function getDice() {
        return $this->dice[array_rand($this->dice)];
    }

    public function rollForCrit($critRate) {
        $randomObject = null;

        $randomNum = mt_rand(1, 100);

        $randomType = mt_rand(1, 3); 

        if ($randomType === 1) {
            $randomObject = $this->getDeck();
        } elseif ($randomType === 2) {
            $randomObject = $this->getCoin();
        } elseif ($randomType === 3) {
            $randomObject = $this->getDice();
        }

        $randomValue = $randomObject->roll(); 

        return $randomValue > $critRate;  
    }
}
    