<?php

namespace Entity;

class Dice {
    private $faces;
    private $numFaces;

    public function __construct(array $faces, $numFaces) {
        $this->faces = $faces;
        $this->numFaces = $numFaces;
    }

    public function roll() {
        return $this->faces[array_rand($this->faces)
    ];
    }
}
