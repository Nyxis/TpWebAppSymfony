<?php

namespace App\Service;

interface Tirage
{


    function diceTirage(): int;

    function deckTirage(): int;

    function coinTirage(): bool;

}