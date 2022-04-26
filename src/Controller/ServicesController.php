<?php

namespace App\Controller;

use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServicesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/services', name: 'app_services')]
    public function index(): Response
    {
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        return $this->render('services/services.html.twig', [
            'informations' => $informations,
        ]);
    }
}
