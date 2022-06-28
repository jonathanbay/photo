<?php

namespace App\Controller;

use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CadeauController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/services/cadeau', name: 'app_services_cadeau')]
    public function index(): Response
    {
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        return $this->render('services/cadeau.html.twig', [
            'informations' => $informations,
        ]);
    }
}
