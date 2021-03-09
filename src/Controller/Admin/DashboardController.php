<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\Commentaires;
use App\Entity\MotsCles;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\linkToCrud;
use EasyCorp\Bundle\EasyAdminBundle\Config\linkToDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Monblog');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            //MenuItem::section('Users'),
            MenuItem::linkToCrud('Users', 'fa fa-user', Users:: class),
            MenuItem::linkToCrud('Articles', 'fa fa-articles', Articles:: class),
            MenuItem::linkToCrud('Commentaires', 'fa fa-commentaires', Commentaires:: class),
            MenuItem::linkToCrud('Mots Clés', 'fa fa-motscles', MotsCles:: class),
            MenuItem::linkToCrud('Catégories', 'fa fa-catégories', Categories:: class),
        ];
        //yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
