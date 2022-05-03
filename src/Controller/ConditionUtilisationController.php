<?php

namespace App\Controller;

use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConditionUtilisationController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/condition/utilisation', name: 'app_condition_utilisation')]
    public function index(): Response
    {
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        return $this->render('condition_utilisation/index.html.twig', [
            'informations' => $informations,
        ]);
    }
}
