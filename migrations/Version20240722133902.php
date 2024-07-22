<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240722133902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Update review table to include user_id and adjust column types.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE review ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE review DROP user');
        $this->addSql('CHANGE rating rating INT NOT NULL');
        $this->addSql('CHANGE comment comment LONGTEXT NOT NULL');
        $this->addSql('CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_794381C6A76ED395 ON review (user_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6A76ED395');
        $this->addSql('DROP INDEX IDX_794381C6A76ED395 ON review');
        $this->addSql('ALTER TABLE review ADD user VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE review DROP user_id');
        $this->addSql('CHANGE rating rating VARCHAR(255) NOT NULL');
        $this->addSql('CHANGE comment comment VARCHAR(500) NOT NULL');
        $this->addSql('CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
