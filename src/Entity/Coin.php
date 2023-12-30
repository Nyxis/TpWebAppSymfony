<?php


namespace App\Entity;

class Coin
{

    private int $lancesReussis;
    private int $nbLancers;

    public function __construct($nbLancers)
    {
        $this->nbLancers = $nbLancers;
        $this->lancesReussis = 0;
    }

    function lancer($nbLancers, $lancersReussis): bool
    {


        $result = (bool)rand(0, 1);
        $result ? $lancersReussis++
            : $result = 0;

        if ($result == 0) return false;
        elseif ($lancersReussis == $nbLancers) return true;
        else return $this->lancer($nbLancers, $lancersReussis);


    }
}
