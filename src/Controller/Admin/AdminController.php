<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use PhpParser\Node\Expr\Yield_;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
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
         return $this->render('dashboard/admin.html.twig',[
             'controller_name' => "DashboardController"
         ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('S.V RealTime.')
            ->setFaviconPath('favicon.svg')
            ->setTranslationDomain('vacancies.sv-realtime.nl')
            ->setTextDirection('ltr')
            ->renderContentMaximized()
            ->generateRelativeUrls();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        Yield  MenuItem::section('Vacancies');
        Yield MenuItem::linkToCrud("Companies",'fa fa-building',CompanyCrudController::getEntityFqcn());
        Yield MenuItem::linkToCrud("Cities",'fa fa-city',CityCrudController::getEntityFqcn());
        Yield MenuItem::linkToCrud("Addresses",'fa fa-road',AddressCrudController::getEntityFqcn());

        Yield  MenuItem::section('Users');
        Yield MenuItem::linkToCrud("Users",'fa fa-users',UserCrudController::getEntityFqcn());
    }
}
