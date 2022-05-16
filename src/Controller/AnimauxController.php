<?php

namespace App\Controller;

use App\Entity\Animaux;
use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AnimauxController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/animaux', name: 'app_animaux')]
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $animauxPortfolio = $this->entityManager->getRepository(Animaux::class)->findAll();
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        $photosAnimaux = $paginator->paginate(
            $animauxPortfolio,
            $request->query->getInt('page', 1),
            20 
        );

        return $this->render('portfolio/animaux.html.twig', [
            'photosAnimauxPortfolio' => $photosAnimaux,
            'informations' => $informations,
        ]);
    }
}
