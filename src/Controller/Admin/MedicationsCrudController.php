<?php

namespace App\Controller\Admin;

use App\Entity\Medications;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MedicationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Medications::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
