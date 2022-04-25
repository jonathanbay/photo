<?php

namespace App\Controller\Admin;

use App\Entity\Carrousel;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class CarrouselCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Carrousel::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextareaField::new('description'),
            DateTimeField::new('createdAt', 'crée le'),
            ImageField::new('photo')
            ->setBasePath('uploads')
            ->setUploadDir('public/uploads')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
        ];
    }
    
}
