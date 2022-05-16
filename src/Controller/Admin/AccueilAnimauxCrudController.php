<?php

namespace App\Controller\Admin;

use App\Entity\AccueilAnimaux;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AccueilAnimauxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AccueilAnimaux::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextareaField::new('description'),
            DateTimeField::new('createdAt', 'crée le'),
            AssociationField::new('categorie'),
            BooleanField::new('isvalid', 'valider'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('photo')->setBasePath('/uploads/photos')->onlyOnIndex(),
        ];
    }
}
