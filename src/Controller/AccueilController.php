<?php

namespace App\Controller;

use App\Entity\AccueilAnimaux;
use App\Entity\AccueilEnfant;
use App\Entity\AccueilEvenement;
use App\Entity\AccueilFamille;
use App\Entity\AccueilMariage;
use App\Entity\Carrousel;
use App\Entity\Contact;
use App\Entity\Informations;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;

class AccueilController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_accueil')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $photosCarrousel = $this->entityManager->getRepository(Carrousel::class)->findAll();
        $photosAccueilMariage = $this->entityManager->getRepository(AccueilMariage::class)->findByIsValid(1);
        $photosAccueilFamille = $this->entityManager->getRepository(AccueilFamille::class)->findByIsValid(1);
        $photosAccueilEvenement = $this->entityManager->getRepository(AccueilEvenement::class)->findByIsValid(1);
        $photosAccueilEnfant = $this->entityManager->getRepository(AccueilEnfant::class)->findByIsValid(1);
        $photosAccueilAnimaux = $this->entityManager->getRepository(AccueilAnimaux::class)->findByIsValid(1);
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            
            $this->entityManager->persist($contact);
            $this->entityManager->flush();

            // envoi de la demande de formulaire par mail

            $email = (new TemplatedEmail())
            ->from($contact->getEmail())
            ->to('admin@example.com')
            ->subject('Demande de renseignements')
            ->htmlTemplate('emails/contact.html.twig')
            ->context([
                'contact' => $contact
            ]);

        $mailer->send($email);

            $this->addFlash('messageEnvoye', 'Votre demande à etait envoyée avec succès!');
            
            return $this->redirectToRoute('app_accueil');
        };


        
        return $this->render('accueil/accueil.html.twig', [
            'photosCarrousel' => $photosCarrousel,
            'photosAccueilMariage' => $photosAccueilMariage,
            'photosAccueilFamille' => $photosAccueilFamille,
            'photosAccueilEvenement' => $photosAccueilEvenement,
            'photosAccueilEnfant' => $photosAccueilEnfant,
            'photosAccueilAnimaux' => $photosAccueilAnimaux,
            'informations' => $informations,
            'form' => $form->createView(),
        ]);
    }
}
