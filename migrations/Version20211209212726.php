<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211209212726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE listing_availability (id INT AUTO_INCREMENT NOT NULL, listing_id INT DEFAULT NULL, available_from DATE NOT NULL, available_until DATE NOT NULL, INDEX IDX_BA858CBED4619D1A (listing_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE listing_availability ADD CONSTRAINT FK_BA858CBED4619D1A FOREIGN KEY (listing_id) REFERENCES listing (id)');
        $this->addSql('ALTER TABLE listing ADD latitude DOUBLE PRECISION NOT NULL, ADD longitude DOUBLE PRECISION NOT NULL, DROP picture_url, DROP location');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE listing_availability');
        $this->addSql('ALTER TABLE listing ADD picture_url VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD location VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP latitude, DROP longitude');
    }
}
