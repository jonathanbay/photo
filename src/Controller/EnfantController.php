<?php

namespace App\Controller;

use App\Entity\Enfant;
use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class EnfantController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/enfant', name: 'app_enfant')]
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $enfantPortfolio = $this->entityManager->getRepository(Enfant::class)->findAll();
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        $photosEnfant = $paginator->paginate(
            $enfantPortfolio,
            $request->query->getInt('page', 1),
            20
        );

        return $this->render('portfolio/enfant.html.twig', [
            'photosEnfantPortfolio' => $photosEnfant,
            'informations' => $informations,
        ]);
    }
}
