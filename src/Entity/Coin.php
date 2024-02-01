<?php

namespace Entity;

class Coin {
    private $numTosses;

    public function __construct($numTosses) {
        $this->numTosses = $numTosses;
    }

    public function toss() {
        $results = [];
        $remainingTosses = $this->numTosses;

        for ($i = 0; $i < $this->numTosses; $i++) {
            $results[] = mt_rand(0, 1);
        }

        while ($remainingTosses > 0) {
            $result = mt_rand(0, 1);
            $results[] = $result;

            if ($result === 1) {
                $remainingTosses--;
            }
        }

        return $results;
    }
}
