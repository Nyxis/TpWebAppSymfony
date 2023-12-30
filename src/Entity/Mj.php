<?php

namespace App\Entity;

class Mj implements Tirage

{

    private string $name;
    private $deck;
    private $dice;
    private $coin;

    /**
     * @param $name
     */
    public function __construct(Deck $deck, Dice $dice, Coin $coin )
    {
        $this->name = "PapiJux";
        $this->deck = $deck;
        $this->dice = $dice;
        $this->coin = $coin;
    }



    function diceTirage($dice): int
    {
        return $dice->jet();
    }

    function coinTirage($coin): bool
    {
        return $coin->lancer(4, 0);

    }

    function deckTirage($tirageAdapter, $deck): int
    {
        return $tirageAdapter->tirageCarteAdapter($deck);
    }
}