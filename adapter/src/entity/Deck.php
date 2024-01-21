<?php

namespace src\entity;


class Deck
{
    protected int $colors;
    protected int $values;

    public function __construct(int $colors, int $values)
    {
        $this->colors = $colors;
        $this->values = $values;
    }
    public function flip() : array
    {
        $suits = ['spades', 'hearts', 'diamonds', 'clubs'];
        $randomSuit = $suits[array_rand($suits)];

        return [
            'suit' => $randomSuit,
            'value' => rand(1, $this->values),
        ];
    }


}