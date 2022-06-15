<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615190855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company_address (company_id INT NOT NULL, address_id INT NOT NULL, PRIMARY KEY(company_id, address_id))');
        $this->addSql('CREATE INDEX IDX_2D1C7556979B1AD6 ON company_address (company_id)');
        $this->addSql('CREATE INDEX IDX_2D1C7556F5B7AF75 ON company_address (address_id)');
        $this->addSql('ALTER TABLE company_address ADD CONSTRAINT FK_2D1C7556979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE company_address ADD CONSTRAINT FK_2D1C7556F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE company DROP CONSTRAINT fk_4fbf094ff5b7af75');
        $this->addSql('DROP INDEX idx_4fbf094ff5b7af75');
        $this->addSql('ALTER TABLE company DROP address_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE company_address');
        $this->addSql('ALTER TABLE company ADD address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT fk_4fbf094ff5b7af75 FOREIGN KEY (address_id) REFERENCES address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_4fbf094ff5b7af75 ON company (address_id)');
    }
}
