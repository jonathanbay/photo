<?php

namespace App\Controller;

use App\Entity\Mariage;
use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class MariageController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    #[Route('/mariage', name: 'app_mariage')]
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $mariagePortfolio = $this->entityManager->getRepository(Mariage::class)->findAll();
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        $photosMariage = $paginator->paginate(
            $mariagePortfolio,
            $request->query->getInt('page', 1),
            20
        );

        return $this->render('portfolio/mariage.html.twig', [

            'photosMariagePortfolio' => $photosMariage,
            'informations' => $informations,
        ]);
    }
}
