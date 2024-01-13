<?php

namespace App\Controller\mj;


use App\Service\MjService\Roller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MjController extends AbstractController
{
    #[Route(path: '/mj/roll')]
    public function main(): Response
    {
        //appel de la méthode statique portée par la classe Roller pour obtenir ce qui sera transmis à la vue

        $sortie = Roller::rollForCrit();
        if (str_contains($sortie, "fort")) $pic = "https://media3.giphy.com/media/a6OnFHzHgCU1O/giphy.gif?cid=ecf05e47mwyjo9ns3ljenwjmigcpw0phi0akpk5lhsmv2srz&ep=v1_gifs_search&rid=giphy.gif&ct=g" ;
        elseif (str_contains($sortie, "nul")) $pic = "https://c.tenor.com/jTKDchcLtrcAAAAd/tenor.gif";
        else $pic = "https://i.giphy.com/HfFccPJv7a9k4.webp";


        return $this->render('mj/roll.html.twig', ['sortie' => $sortie, 'pic'=>$pic]);

    }


}