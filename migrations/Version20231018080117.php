<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018080117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE copyright (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nft_collection (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, nft_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artwork ADD category_id INT DEFAULT NULL, ADD copyright_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC57612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC5767CC95D23 FOREIGN KEY (copyright_id) REFERENCES copyright (id)');
        $this->addSql('CREATE INDEX IDX_881FC57612469DE2 ON artwork (category_id)');
        $this->addSql('CREATE INDEX IDX_881FC5767CC95D23 ON artwork (copyright_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY FK_881FC57612469DE2');
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY FK_881FC5767CC95D23');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE copyright');
        $this->addSql('DROP TABLE nft_collection');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP INDEX IDX_881FC57612469DE2 ON artwork');
        $this->addSql('DROP INDEX IDX_881FC5767CC95D23 ON artwork');
        $this->addSql('ALTER TABLE artwork DROP category_id, DROP copyright_id');
    }
}
