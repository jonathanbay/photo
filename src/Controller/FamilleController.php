<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FamilleController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/famille', name: 'app_famille')]
    public function index(): Response
    {
        $famillePortfolio = $this->entityManager->getRepository(Famille::class)->findAll();
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        return $this->render('portfolio/famille.html.twig', [
            'photosFamillePortfolio' => $famillePortfolio,
            'informations' => $informations,
        ]);
    }
}
