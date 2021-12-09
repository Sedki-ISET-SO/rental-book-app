<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211209194009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE listing_amenity (id INT AUTO_INCREMENT NOT NULL, listing_id INT DEFAULT NULL, name TINYINT(1) NOT NULL, INDEX IDX_B45E022CD4619D1A (listing_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE listing_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE listing_picture (id INT AUTO_INCREMENT NOT NULL, listing_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_9E534C6D4619D1A (listing_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, INDEX IDX_B6BD307FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rating (id INT AUTO_INCREMENT NOT NULL, writer_id INT NOT NULL, listing_id INT DEFAULT NULL, start_review INT NOT NULL, feedback VARCHAR(255) NOT NULL, INDEX IDX_D88926221BC7E6B6 (writer_id), INDEX IDX_D8892622D4619D1A (listing_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE listing_amenity ADD CONSTRAINT FK_B45E022CD4619D1A FOREIGN KEY (listing_id) REFERENCES listing (id)');
        $this->addSql('ALTER TABLE listing_picture ADD CONSTRAINT FK_9E534C6D4619D1A FOREIGN KEY (listing_id) REFERENCES listing (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D88926221BC7E6B6 FOREIGN KEY (writer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622D4619D1A FOREIGN KEY (listing_id) REFERENCES listing (id)');
        $this->addSql('ALTER TABLE listing ADD listing_category_id INT DEFAULT NULL, DROP category, DROP pet_friendly_space, DROP wifi, DROP free_parking, DROP pool, DROP air_conditioning, DROP washer, DROP tv');
        $this->addSql('ALTER TABLE listing ADD CONSTRAINT FK_CB0048D4455844B0 FOREIGN KEY (listing_category_id) REFERENCES listing_category (id)');
        $this->addSql('CREATE INDEX IDX_CB0048D4455844B0 ON listing (listing_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE listing DROP FOREIGN KEY FK_CB0048D4455844B0');
        $this->addSql('DROP TABLE listing_amenity');
        $this->addSql('DROP TABLE listing_category');
        $this->addSql('DROP TABLE listing_picture');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP INDEX IDX_CB0048D4455844B0 ON listing');
        $this->addSql('ALTER TABLE listing ADD category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD pet_friendly_space TINYINT(1) NOT NULL, ADD wifi TINYINT(1) NOT NULL, ADD free_parking TINYINT(1) NOT NULL, ADD pool TINYINT(1) NOT NULL, ADD air_conditioning TINYINT(1) NOT NULL, ADD washer TINYINT(1) NOT NULL, ADD tv TINYINT(1) NOT NULL, DROP listing_category_id');
    }
}
