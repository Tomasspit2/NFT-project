<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018095115 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artwork (id INT AUTO_INCREMENT NOT NULL, user_artwork_id INT DEFAULT NULL, category_id INT DEFAULT NULL, copyright_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, image_url VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, INDEX IDX_881FC576AADF3948 (user_artwork_id), INDEX IDX_881FC57612469DE2 (category_id), INDEX IDX_881FC5767CC95D23 (copyright_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE copyright (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nft_collection (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, nft_url VARCHAR(255) NOT NULL, INDEX IDX_EB2638C0A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, order_status_id INT DEFAULT NULL, INDEX IDX_F5299398D7707B45 (order_status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC576AADF3948 FOREIGN KEY (user_artwork_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC57612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC5767CC95D23 FOREIGN KEY (copyright_id) REFERENCES copyright (id)');
        $this->addSql('ALTER TABLE nft_collection ADD CONSTRAINT FK_EB2638C0A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398D7707B45 FOREIGN KEY (order_status_id) REFERENCES order_status (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY FK_881FC576AADF3948');
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY FK_881FC57612469DE2');
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY FK_881FC5767CC95D23');
        $this->addSql('ALTER TABLE nft_collection DROP FOREIGN KEY FK_EB2638C0A76ED395');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398D7707B45');
        $this->addSql('DROP TABLE artwork');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE copyright');
        $this->addSql('DROP TABLE nft_collection');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_status');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
