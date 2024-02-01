<?php

namespace Entity;

class Deck {
    private $cards;
    private $numColors;
    private $numValues;

    public function __construct(array $cards, $numColors, $numValues) {
        $this->cards = $cards;
        $this->numColors = $numColors;
        $this->numValues = $numValues;
    }

    public function drawCard() {
        return $this->cards[array_rand($this->cards)];
    }

    public function generateValue() {
        $color = mt_rand(1, $this->numColors);
        $value = mt_rand(1, $this->numValues);

        return ($color - 1) * $this->numValues + $value;
} 
}


interface Randomizable {
    public function getRandomValue();
}

class DeckAdapter implements Randomizable {
    private $deck;

    public function __construct(Deck $deck) {
        $this->deck = $deck;
    }

    public function getRandomValue() {
        return $this->deck->drawCard();
    }
}
