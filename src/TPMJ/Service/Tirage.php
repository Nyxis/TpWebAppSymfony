<?php

namespace App\TPMJ\Service;
interface Tirage
{


    function diceTirage(): int;

    function deckTirage(): int;

    function coinTirage(): bool;

}