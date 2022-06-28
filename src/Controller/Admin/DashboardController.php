<?php

namespace App\Controller\Admin;

use App\Entity\AccueilAnimaux;
use App\Entity\AccueilEnfant;
use App\Entity\AccueilEvenement;
use App\Entity\AccueilFamille;
use App\Entity\AccueilMariage;
use App\Entity\Animaux;
use App\Entity\Carrousel;
use App\Entity\Categorie;
use App\Entity\Contact;
use App\Entity\Enfant;
use App\Entity\Evenement;
use App\Entity\Famille;
use App\Entity\Informations;
use App\Entity\Mariage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SitePhotomaeght');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Catégorie', 'fas fa-list', Categorie::class);

        yield MenuItem::section('gestion photos page d\'accueil');

        yield MenuItem::linkToCrud('Photos carrousel', 'fas fa-desktop', Carrousel::class);

        yield MenuItem::subMenu('Photos accueil Portfolio', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Photos accueil mariage', 'fas fa-portrait', AccueilMariage::class),
            MenuItem::linkToCrud('Photos accueil famille', 'fas fa-portrait', AccueilFamille::class),
            MenuItem::linkToCrud('Photos accueil Enfant', 'fas fa-portrait', AccueilEnfant::class),
            MenuItem::linkToCrud('Photos accueil evenement', 'fas fa-portrait', AccueilEvenement::class),
            MenuItem::linkToCrud('Photos accueil animal', 'fas fa-portrait', AccueilAnimaux::class),
        ]);

        yield MenuItem::section('portfolio');

        yield MenuItem::linkToCrud('Portfolio mariages', 'fas fa-ring', Mariage::class);
        yield MenuItem::linkToCrud('Portfolio enfants', 'fas fa-child', Enfant::class);
        yield MenuItem::linkToCrud('Portfolio aninaux', 'fas fa-cat', Animaux::class);
        yield MenuItem::linkToCrud('Portfolio evenements', 'fas fa-trophy', Evenement::class);
        yield MenuItem::linkToCrud('Portfolio famille', 'fas fa-users', Famille::class);

        yield MenuItem::section('services');

        yield MenuItem::linkToCrud('Information', 'fas fa-info', Informations::class);

        yield MenuItem::section('RGPD');
            yield MenuItem::linkToCrud('Données utilisateurs', 'fas fa-lock', Contact::class);
    }
}
