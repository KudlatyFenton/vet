<?php

namespace App\Controller\Admin;

use App\Entity\Animals;
use App\Entity\Appointments;
use App\Entity\Owners;
use App\Entity\Medications;
use App\Entity\Prescription;
use App\Entity\Procedures;
use App\Entity\Vaccinations;
use App\Entity\Vaccines;
use App\Entity\Doctors;

use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class DashboardController extends AbstractDashboardController
{

    private ChartBuilderInterface $chartBuilder;

    
    #[Route('/', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
       
            
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Vet')
            ->setFaviconPath('/../../../assets/shield-dog-solid.svg')
            ->disableDarkMode()
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Doctors', 'fa fa-user-doctor', Doctors::class);
        yield MenuItem::linkToCrud('Animals', 'fa fa-dog', Animals::class);
        yield MenuItem::linkToCrud('Owners', 'fa fa-person', Owners::class);
        yield MenuItem::linkToCrud('Medications', 'fa fa-pills', Medications::class);
        yield MenuItem::linkToCrud('Appointments', 'fa fa-calendar', Appointments::class);
        yield MenuItem::linkToCrud('Procedures', 'fa fa-briefcase-medical', Procedures::class);
        yield MenuItem::linkToCrud('Vaccinations', 'fa fa-syringe', Vaccinations::class);
        yield MenuItem::linkToCrud('Vaccines', 'fa fa-prescription-bottle', Vaccines::class);
        yield MenuItem::linkToCrud('Prescriptions', 'fa fa-prescription', Prescription::class);
    }

}
