<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class FamilleController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/famille', name: 'app_famille')]
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $famillePortfolio = $this->entityManager->getRepository(Famille::class)->findAll();
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        $photosfamille = $paginator->paginate(
            $famillePortfolio,
            $request->query->getInt('page', 1),
            20
        );

        return $this->render('portfolio/famille.html.twig', [
            'photosFamillePortfolio' => $photosfamille,
            'informations' => $informations,
        ]);
    }
}
