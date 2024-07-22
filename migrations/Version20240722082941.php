<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240722082941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add roles column to user table';
    }

    public function up(Schema $schema): void
    {
        // Ajoute la colonne `roles` sans valeur par défaut
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL;');
    }

    public function down(Schema $schema): void
    {
        // Supprime la colonne `roles`
        $this->addSql('ALTER TABLE user DROP roles;');
    }
}
