<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260403080340 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create relation many to one between cats and owner.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE owner (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(40) NOT NULL, city VARCHAR(50) DEFAULT NULL, postal_code VARCHAR(10) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE cat ADD owner_id INT NOT NULL');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A87E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (id)');
        $this->addSql('CREATE INDEX IDX_9E5E43A87E3C61F9 ON cat (owner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE owner');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A87E3C61F9');
        $this->addSql('DROP INDEX IDX_9E5E43A87E3C61F9 ON cat');
        $this->addSql('ALTER TABLE cat DROP owner_id');
    }
}
