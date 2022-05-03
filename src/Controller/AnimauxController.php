<?php

namespace App\Controller;

use App\Entity\Animaux;
use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimauxController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/animaux', name: 'app_animaux')]
    public function index(): Response
    {
        $animauxPortfolio = $this->entityManager->getRepository(Animaux::class)->findAll();
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        return $this->render('portfolio/animaux.html.twig', [
            'photosAnimauxPortfolio' => $animauxPortfolio,
            'informations' => $informations,
        ]);
    }
}
