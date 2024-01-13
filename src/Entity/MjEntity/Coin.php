<?php


namespace App\Entity;

class Coin
{

    private int $lancesReussis;
    private int $nbLancers;

    public function __construct()
    {
        $this->nbLancers = rand(1, 4);
        $this->lancesReussis = 0;
    }

    //la récursivité de la méthode dépend du nombre de lancers réussis ou du nombre total de lancers
    function lancer($nbLancers, $lancersReussis): bool
    {


        $result = (bool)rand(0, 1);
        $result ? $lancersReussis++
            : $result = 0;

        if ($result == 0) return false;
        elseif ($lancersReussis == $nbLancers) return true;
        else return $this->lancer($nbLancers, $lancersReussis);

    }

    public function getNbLancers(): int
    {
        return $this->nbLancers;
    }

}
