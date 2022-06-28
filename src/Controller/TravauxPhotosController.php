<?php

namespace App\Controller;

use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TravauxPhotosController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/travaux/photos', name: 'app_travaux_photos')]
    public function index(): Response
    {
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        return $this->render('services/travauxPhotos.html.twig', [
            'informations' => $informations,
        ]);
    }

}
