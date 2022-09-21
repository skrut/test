<?php
declare(strict_types=1);

namespace App\Entity\News;

use App\Entity\AbstractDatabaseEntity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'news_items')]
class NewsItem extends AbstractDatabaseEntity
{
    #[ORM\Column(type: Types::BOOLEAN)]
    protected bool $active = true;

    #[Assert\NotNull]
    #[ORM\ManyToOne(targetEntity: Category::class,)]
    #[ORM\JoinColumn(nullable: false)]
    protected Category $category;

    #[Assert\NotBlank]
    #[ORM\Column(type: Types::TEXT, length: 4096)]
    protected string $content;

    #[Assert\NotBlank]
    #[ORM\Column(type: Types::STRING, length: 255)]
    protected string $name;

    #[ORM\Column(type: Types::STRING, length: 512, unique: true)]
    #[Gedmo\Slug(fields: ['name'])]
    protected string $slug;

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
