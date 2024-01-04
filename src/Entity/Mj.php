<?php

namespace App\Entity;

use App\Service\Tirage;
use App\Service\TirageAdapter;

class Mj implements Tirage

{

    private string $name;
    private $deck;
    private $dice;
    private $coin;

    /**
     * @param $name
     */
    public function __construct( $deck,  $dice,  $coin)
    {
        $this->name = "PapiJux";
        $this->deck = $deck;
        $this->dice = $dice;
        $this->coin = $coin;
    }


    function diceTirage(): int
    {
        return $this->dice->jet();
    }

    function coinTirage(): bool
    {
        return $this->coin->lancer(4, 0);

    }

    function deckTirage(): int
    {
        return TirageAdapter::tirageCarteAdapter($this->deck);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDeck(): Deck
    {
        return $this->deck;
    }

    public function getDice(): Dice
    {
        return $this->dice;
    }

    public function getCoin(): Coin
    {
        return $this->coin;
    }

}