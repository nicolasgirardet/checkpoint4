<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220720102250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe ADD cuisine_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137ED4BAC14 FOREIGN KEY (cuisine_id) REFERENCES cuisine (id)');
        $this->addSql('CREATE INDEX IDX_DA88B137ED4BAC14 ON recipe (cuisine_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137ED4BAC14');
        $this->addSql('DROP INDEX IDX_DA88B137ED4BAC14 ON recipe');
        $this->addSql('ALTER TABLE recipe DROP cuisine_id');
    }
}
