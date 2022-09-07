<?php

namespace App\Controller;

use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    #[Route('/', name: 'animaux')]
    public function index(AnimalRepository $repoAnimal): Response {
        $animaux = $repoAnimal->findAll();

        return $this->render('animal/index.html.twig', [
            "animaux" => $animaux
        ]);
    }

    #[Route('/animal/{id}', name: 'afficher_animal')]
    public function afficherAnimal(AnimalRepository $animalRepository, $id): Response {
        $animal = $animalRepository->find($id);

        return $this->render('animal/afficherAnimal.html.twig', [
            "animal" => $animal
        ]);
    }
}
