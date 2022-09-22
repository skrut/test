<?php
declare(strict_types=1);

namespace App\Admin\News\Controller;

use App\Entity\News\Category;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/**
 * News category CRUD controller
 */
class CategoryCrudController extends AbstractCrudController
{
    /**
     * Returns entity Fqcn
     */
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    /**
     * Configure form fields
     */
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->onlyOnIndex();
        yield TextField::new('name');
        yield BooleanField::new('active');
        yield DateTimeField::new('createdAt')->onlyOnIndex();
        yield DateTimeField::new('updatedAt')->onlyOnIndex();
    }
}
