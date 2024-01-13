<?php

namespace App\Service\MjService;
interface Tirage
{


    function diceTirage(): int;

    function deckTirage(): int;

    function coinTirage(): bool;

}