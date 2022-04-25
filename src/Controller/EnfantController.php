<?php

namespace App\Controller;

use App\Entity\Enfant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EnfantController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/enfant', name: 'app_enfant')]
    public function index(): Response
    {
        $enfantPortfolio = $this->entityManager->getRepository(Enfant::class)->findAll();

        return $this->render('enfant/enfant.html.twig', [
            'photosEnfantPortfolio' => $enfantPortfolio,
        ]);
    }
}
