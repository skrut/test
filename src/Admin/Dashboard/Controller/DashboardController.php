<?php
declare(strict_types=1);

namespace App\Admin\Dashboard\Controller;

use App\Admin\News\Controller\CategoryCrudController;
use App\Entity\News\Category;
use App\Entity\News\NewsItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Test Project');
    }

    public function configureMenuItems(): iterable
    {
        // News section
        yield MenuItem::section('News');
        yield MenuItem::linkToCrud('Categories', 'fas fa-key', Category::class);
        yield MenuItem::linkToCrud('News Items', 'fas fa-key', NewsItem::class);
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->redirect($this->adminUrlGenerator->setController(CategoryCrudController::class)->generateUrl());
    }
}
