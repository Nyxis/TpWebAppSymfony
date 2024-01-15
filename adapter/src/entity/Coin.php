<?php

namespace src\entity;

require_once "RandomGeneratorInterface.php";

class Coin implements RandomGeneratorInterface
{
    public function toss(): bool
    {
        return (bool) rand(0, 1);
    }

    public function generateRandom(): int
    {
        return $this->toss() ? 1 : 0;
    }
}
