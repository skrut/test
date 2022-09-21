<?php
declare(strict_types=1);

namespace App\Admin\News\Controller;

use App\Entity\News\NewsItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NewItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NewsItem::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->onlyOnIndex();
        yield TextField::new('name');
        yield AssociationField::new('category');
        yield TextEditorField::new('content')->onlyOnForms();
        yield BooleanField::new('active');
        yield DateTimeField::new('createdAt')->onlyOnIndex();
        yield DateTimeField::new('updatedAt')->onlyOnIndex();
    }
}
