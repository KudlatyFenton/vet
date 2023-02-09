<?php

namespace App\Controller\Admin;

use App\Entity\Vaccines;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VaccinesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vaccines::class;
    }

    public function configureFields(string $pageName): iterable
    {
        //yield IdField::new ('owner_id');
        yield TextField::new('vaccine_name');
        yield TextField::new('description');
        yield NumberField::new('price');
        yield NumberField::new('quantity');
        yield AssociationField::new ('vaccinations');

    }
}
