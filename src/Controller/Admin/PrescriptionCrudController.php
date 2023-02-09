<?php

namespace App\Controller\Admin;

use App\Entity\Prescription;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class PrescriptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Prescription::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('medication'),
            AssociationField::new('appointment')->onlyOnIndex()
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
