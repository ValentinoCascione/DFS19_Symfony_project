<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Actor;
use App\Entity\Genre;
use App\Entity\Studio;
use App\Entity\Movie;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        if (!$this->getUser()) return $this->redirectToRoute('app_login');

        if (!in_array('ROLE_ADMIN', $this->getUser()->getRoles())) return $this->redirectToRoute('app_login');

        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My movies');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::linkToCrud('Acteur', 'fa fa-user', Actor::class),
            MenuItem::linkToCrud('Genre', 'fa fa-file-text', Genre::class),
            MenuItem::linkToCrud('Studio', 'fa fa-house-user', Studio::class),
            MenuItem::linkToCrud('Film', 'fa fa-film', Movie::class),
        ];
    }
}
