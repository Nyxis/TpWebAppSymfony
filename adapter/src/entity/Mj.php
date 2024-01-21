<?php

namespace src\entity;

require_once "RandomGeneratorInterface.php";

class Mj
{
    protected array $randomObjects;

    public function __construct(RandomGeneratorInterface ...$randomObjects)
    {
        $this->randomObjects = $randomObjects;
    }

    public function rollForCrit($critRate): array
    {
        $randomObject = $this->getRandomObject();
        $randomValue = $randomObject->generateRandom();
        $success = $randomValue > $critRate;
        return [
            'object' => get_class($randomObject),
            'value' => $randomValue,
            'success' => $success,

        ];
    }

    private function getRandomObject(): RandomGeneratorInterface
    {
        $randomIndex = array_rand($this->randomObjects);
        return $this->randomObjects[$randomIndex];
    }
}
