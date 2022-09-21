<?php
declare(strict_types=1);

namespace App\Entity\News;

use App\Entity\AbstractDatabaseEntity;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity]
#[ORM\Table(name: 'news_categories')]
class Category extends AbstractDatabaseEntity
{
    #[ORM\Column(type: Types::BOOLEAN)]
    protected bool $active = true;

    #[ORM\Column(type: Types::STRING, length: 255)]
    protected string $name;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: NewsItem::class, cascade: ['remove'], orphanRemoval: true)]
    protected Collection $news;

    #[ORM\Column(type: Types::STRING, length: 512, unique: true)]
    #[Gedmo\Slug(fields: ['name'])]
    protected string $slug;

    public function __toString(): string
    {
        return $this->getName();
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
