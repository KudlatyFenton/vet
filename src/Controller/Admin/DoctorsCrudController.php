<?php

namespace App\Controller\Admin;

use App\Entity\Doctors;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DoctorsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Doctors::class;
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
