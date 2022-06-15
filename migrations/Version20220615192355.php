<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615192355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE address_company');
        $this->addSql('ALTER TABLE address DROP CONSTRAINT fk_d4e6f818bac62af');
        $this->addSql('DROP INDEX uniq_d4e6f818bac62af');
        $this->addSql('ALTER TABLE address DROP city_id');
        $this->addSql('ALTER TABLE city ADD addresses_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B02345713BC80 FOREIGN KEY (addresses_id) REFERENCES address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_2D5B02345713BC80 ON city (addresses_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE address_company (address_id INT NOT NULL, company_id INT NOT NULL, PRIMARY KEY(address_id, company_id))');
        $this->addSql('CREATE INDEX idx_145afed7979b1ad6 ON address_company (company_id)');
        $this->addSql('CREATE INDEX idx_145afed7f5b7af75 ON address_company (address_id)');
        $this->addSql('ALTER TABLE address_company ADD CONSTRAINT fk_145afed7f5b7af75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE address_company ADD CONSTRAINT fk_145afed7979b1ad6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE city DROP CONSTRAINT FK_2D5B02345713BC80');
        $this->addSql('DROP INDEX IDX_2D5B02345713BC80');
        $this->addSql('ALTER TABLE city DROP addresses_id');
        $this->addSql('ALTER TABLE address ADD city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT fk_d4e6f818bac62af FOREIGN KEY (city_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_d4e6f818bac62af ON address (city_id)');
    }
}
