<?php

namespace App\Controller\Admin;

use App\Entity\Appointments;
use App\Entity\Procedures;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use Symfony\Component\Validator\Constraints\Currency;

class AppointmentsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Appointments::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date'),
            TimeField::new('time'),
            AssociationField::new('doctor'),
            TextEditorField::new('notes'),
            AssociationField::new('animal'),
            CollectionField::new('procedures')
            ->allowAdd(true)
            ->setEntryIsComplex()
            ->renderExpanded()
            ->useEntryCrudForm()
            ->hideOnDetail(),
            CollectionField::new('procedures')
            ->renderExpanded()
            ->onlyOnDetail()
            ->useEntryCrudForm(),
            CollectionField::new('vaccinations')
            ->allowAdd(true)
            ->setEntryIsComplex()
            ->renderExpanded()
            ->useEntryCrudForm(),
            CollectionField::new('prescriptions')
            ->allowAdd(true)
            ->setEntryIsComplex()
            ->renderExpanded()
            ->useEntryCrudForm(),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
    
}
