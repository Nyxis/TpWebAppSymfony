<?php

namespace src\entity;

require_once "RandomGeneratorInterface.php";
class Dice implements RandomGeneratorInterface
{
    protected array $faces;
    protected int $maxValue;

    public function __construct(int|array $faces)
    {
        $this->faces = is_array($faces) ? $faces : array_keys(array_fill(1, $faces, null));
        $this->maxValue = max($this->faces);
    }

    public function generateRandom(): int
    {
        return $this->faces[array_rand($this->faces)];
    }

    public function rollForCrit(int $critRate): bool
    {
        return $this->generateRandom() > $critRate;
    }
}