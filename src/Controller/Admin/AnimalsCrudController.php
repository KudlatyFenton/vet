<?php

namespace App\Controller\Admin;

use App\Entity\Animals;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AnimalsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animals::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $sex = ['female', 'male'];

        yield TextField::new('name');
        yield TextField::new('species');
        yield TextField::new('breed');
        yield ChoiceField::new('sex')
            ->onlyOnForms()
            ->setFormTypeOptions(['choices' => array_combine($sex, $sex),])
            ->renderExpanded();
        yield NumberField::new('age');
        yield TextField::new('medical_history');
        yield AssociationField::new ('owner');

    }
    
    
}
