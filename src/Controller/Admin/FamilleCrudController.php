<?php

namespace App\Controller\Admin;

use App\Entity\Famille;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FamilleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Famille::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextareaField::new('description'),
            DateTimeField::new('createdAt', 'crée le'),
            AssociationField::new('categorie'),
            ImageField::new('photo')
            ->setBasePath('uploads')
            ->setUploadDir('public/uploads')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
        ];
    }
}
