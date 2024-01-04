<?php

namespace App\Entity;




use mysql_xdevapi\Result;

class Dice
{

    private array $faces;


    public function __construct()
    {
        $nombreDeFacesPossible = [
            [1,2,3,4,5,6],
            [1,2,3,4,5,6,7,8,9],
            [1,2,3,4,5,6,7,8,9,10,11,12]
        ];
        $faces = $nombreDeFacesPossible[rand(0,2)];
        $this->faces = $faces;
    }

    public function jet(): int
    {
        $result = $this->faces[rand(0, count($this->faces))];
        return $result;
    }

    public function getFaces(): array
    {
        return $this->faces;
    }

}