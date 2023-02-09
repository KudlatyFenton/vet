<?php

namespace App\Controller\Admin;

use App\Entity\Procedures;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Currency;

class ProceduresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Procedures::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('procedure_name'),
            TextEditorField::new('notes'),
            MoneyField::new('price')->setCurrency('PLN'),
        ];
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
