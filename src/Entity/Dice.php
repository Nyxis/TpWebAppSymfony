<?php

namespace App\Entity;




class Dice
{

    private array $faces;

    /**
     * @param array $faces
     */
    public function __construct(array $faces)
    {
        $this->faces = $faces;
    }

    public function jet()
    {
        return $this->faces[rand(0, count($this->faces))];

    }

}