<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211204200500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD COLUMN username VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN surname VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN roles CLOB NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN registration_date INTEGER DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN enabled BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE user ADD COLUMN confiramtion_token VARCHAR(40) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, name FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO user (id, name) SELECT id, name FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }
}
