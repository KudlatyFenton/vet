<?php

namespace App\Controller\Admin;

use App\Entity\Owners;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OwnersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Owners::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        //yield IdField::new ('owner_id');
        yield TextField::new('name');
        yield TextField::new('contact_info');
        yield TextField::new('notes');
        yield CollectionField::new ('animals')->renderExpanded();

    }
}
