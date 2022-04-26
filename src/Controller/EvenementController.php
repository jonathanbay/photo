<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EvenementController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    
    #[Route('/evenement', name: 'app_evenement')]
    public function index(): Response
    {
        $evenementPortfolio = $this->entityManager->getRepository(Evenement::class)->findAll();
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        return $this->render('evenement/evenement.html.twig', [
            'photosEvenementportfolio' => $evenementPortfolio,
            'informations' => $informations,
        ]);
    }
}
