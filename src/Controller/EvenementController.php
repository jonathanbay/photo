<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class EvenementController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    
    #[Route('/evenement', name: 'app_evenement')]
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $evenementPortfolio = $this->entityManager->getRepository(Evenement::class)->findAll();
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        $photosEvenement = $paginator->paginate(
            $evenementPortfolio,
            $request->query->getInt('page', 1),
            20
        );

        return $this->render('portfolio/evenement.html.twig', [
            'photosEvenementportfolio' => $photosEvenement,
            'informations' => $informations,
        ]);
    }
}
