<?php

namespace App\Entity\MjEntity;

use App\Service\MjService\Tirage;
use App\Service\MjService\TirageAdapter;

class Mj implements Tirage

{

    private string $name;
    private $deck;
    private $dice;
    private $coin;

    /**
     * @param $deck
     * @param $dice
     * @param $coin
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
        return $this->coin->lancer($this->coin->getNbLancers(), 0);

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