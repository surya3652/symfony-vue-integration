<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240227085357 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee ADD id INT AUTO_INCREMENT NOT NULL, CHANGE emp_id emp_id INT NOT NULL, CHANGE emp_name emp_name VARCHAR(50) NOT NULL, CHANGE emp_designation emp_designation VARCHAR(50) NOT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE employee DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE employee DROP id, CHANGE emp_id emp_id INT DEFAULT 0, CHANGE emp_name emp_name TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, CHANGE emp_designation emp_designation TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`');
    }
}
