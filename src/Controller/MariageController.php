<?php

namespace App\Controller;

use App\Entity\Mariage;
use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MariageController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    #[Route('/mariage', name: 'app_mariage')]
    public function index(): Response
    {
        $mariagePortfolio = $this->entityManager->getRepository(Mariage::class)->findAll();
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        return $this->render('mariage/mariage.html.twig', [

            'photosMariagePortfolio' => $mariagePortfolio,
            'informations' => $informations,
        ]);
    }
}
