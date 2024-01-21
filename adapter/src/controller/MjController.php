<?php

require_once 'vendor/autoload.php';
require_once 'src\Entity\Mj.php';
require_once 'src\Entity\Deck.php';
require_once 'src\Entity\Coin.php';
require_once 'src\Entity\Dice.php';
require_once 'src\Entity\DeckRandomGeneratorAdapter.php';
require_once 'src\Entity\RandomGeneratorInterface.php';

use Src\Entity\Coin;
use Src\Entity\Dice;
use Src\Entity\Mj;


$coin = new Coin();
$deckAdapter = new \src\entity\DeckRandomGeneratorAdapter(4,13);
$dice = new Dice([1, 2, 3, 4, 5, 6]);


$mj = new Mj($coin, $deckAdapter, $dice);

$critRate = 4;

$result = $mj->rollForCrit($critRate);

