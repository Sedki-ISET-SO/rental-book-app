<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220104194114 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, status VARCHAR(30) NOT NULL, INDEX IDX_E00CEDDEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking_listing (booking_id INT NOT NULL, listing_id INT NOT NULL, INDEX IDX_91BE0DF43301C60 (booking_id), INDEX IDX_91BE0DF4D4619D1A (listing_id), PRIMARY KEY(booking_id, listing_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE booking_listing ADD CONSTRAINT FK_91BE0DF43301C60 FOREIGN KEY (booking_id) REFERENCES booking (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE booking_listing ADD CONSTRAINT FK_91BE0DF4D4619D1A FOREIGN KEY (listing_id) REFERENCES listing (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking_listing DROP FOREIGN KEY FK_91BE0DF43301C60');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE booking_listing');
    }
}
