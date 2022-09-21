<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220921045006 extends AbstractMigration
{
    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE news_categories');
        $this->addSql('DROP TABLE news_items');
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE news_categories (id CHAR(36) NOT NULL --(DC2Type:guid)
        , active BOOLEAN NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(512) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D68C9111989D9B62 ON news_categories (slug)');
        $this->addSql('CREATE TABLE news_items (id CHAR(36) NOT NULL --(DC2Type:guid)
        , category_id CHAR(36) NOT NULL --(DC2Type:guid)
        , active BOOLEAN NOT NULL, content CLOB NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(512) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , PRIMARY KEY(id), CONSTRAINT FK_9BA16E1312469DE2 FOREIGN KEY (category_id) REFERENCES news_categories (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9BA16E13989D9B62 ON news_items (slug)');
        $this->addSql('CREATE INDEX IDX_9BA16E1312469DE2 ON news_items (category_id)');
    }
}
