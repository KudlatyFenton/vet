<?php

namespace App\Controller\Admin;

use App\Entity\Vaccinations;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VaccinationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vaccinations::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('expiry_date'),
            AssociationField::new('vaccine'),
            AssociationField::new('appointment')->onlyOnIndex()->autocomplete()

            
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPaginatorUseOutputWalkers(true)
        ;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->disable(Action::NEW, Action::EDIT)
            ->disable(Action::NEW, Action::DELETE)
        ;
    }
}
