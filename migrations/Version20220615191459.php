<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615191459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address_company (address_id INT NOT NULL, company_id INT NOT NULL, PRIMARY KEY(address_id, company_id))');
        $this->addSql('CREATE INDEX IDX_145AFED7F5B7AF75 ON address_company (address_id)');
        $this->addSql('CREATE INDEX IDX_145AFED7979B1AD6 ON address_company (company_id)');
        $this->addSql('ALTER TABLE address_company ADD CONSTRAINT FK_145AFED7F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE address_company ADD CONSTRAINT FK_145AFED7979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE address_company');
    }
}
