<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContinentController extends AbstractController
{
    #[Route('/continents', name: 'continents')]
    public function index(ContinentRepository $repoContinent): Response
    {
        $continents = $repoContinent->findAll();

        return $this->render('continent/continents.html.twig', [
            'continents' => $continents,
        ]);
    }

    #[Route('/continent/{id}', name: 'afficher_continent')]
    public function afficherContinent(Continent $continent): Response
    {
        return $this->render('continent/afficherContinent.html.twig', [
            'continent' => $continent,
        ]);
    }
}
