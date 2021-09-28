<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210928094536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CD942F794');
        $this->addSql('DROP INDEX IDX_9067F23CD942F794 ON mission');
        $this->addSql('ALTER TABLE mission DROP mission_status_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission ADD mission_status_id INT NOT NULL');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CD942F794 FOREIGN KEY (mission_status_id) REFERENCES mission_status (id)');
        $this->addSql('CREATE INDEX IDX_9067F23CD942F794 ON mission (mission_status_id)');
    }
}
