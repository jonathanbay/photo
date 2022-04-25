<?php

namespace App\Controller;

use App\Entity\AccueilAnimaux;
use App\Entity\AccueilEnfant;
use App\Entity\AccueilEvenement;
use App\Entity\AccueilFamille;
use App\Entity\AccueilMariage;
use App\Entity\Carrousel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        $photosCarrousel = $this->entityManager->getRepository(Carrousel::class)->findAll();
        $photosAccueilMariage = $this->entityManager->getRepository(AccueilMariage::class)->findByIsValid(1);
        $photosAccueilFamille = $this->entityManager->getRepository(AccueilFamille::class)->findByIsValid(1);
        $photosAccueilEvenement = $this->entityManager->getRepository(AccueilEvenement::class)->findByIsValid(1);
        $photosAccueilEnfant = $this->entityManager->getRepository(AccueilEnfant::class)->findByIsValid(1);
        $photosAccueilAnimaux = $this->entityManager->getRepository(AccueilAnimaux::class)->findByIsValid(1);

        
        return $this->render('accueil/accueil.html.twig', [
            'photosCarrousel' => $photosCarrousel,
            'photosAccueilMariage' => $photosAccueilMariage,
            'photosAccueilFamille' => $photosAccueilFamille,
            'photosAccueilEvenement' => $photosAccueilEvenement,
            'photosAccueilEnfant' => $photosAccueilEnfant,
            'photosAccueilAnimaux' => $photosAccueilAnimaux
        ]);
    }
}
