<?php

namespace App\Controller\Admin;

use App\Entity\Informations;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class InformationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Informations::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextareaField::new('adresse'),
            TextField::new('telephone'),
            TextField::new('email'),
            TextField::new('facebook', 'lien facebook'),

        ];
    }
    
}
