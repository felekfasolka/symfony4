<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210928083155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CD942F794');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C547018DE');
        $this->addSql('DROP TABLE mission_status');
        $this->addSql('DROP TABLE mission_type');
        $this->addSql('DROP INDEX IDX_9067F23C547018DE ON mission');
        $this->addSql('DROP INDEX IDX_9067F23CD942F794 ON mission');
        $this->addSql('ALTER TABLE mission DROP mission_type_id, DROP mission_status_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mission_status (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mission_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE mission ADD mission_type_id INT NOT NULL, ADD mission_status_id INT NOT NULL');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C547018DE FOREIGN KEY (mission_type_id) REFERENCES mission_type (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CD942F794 FOREIGN KEY (mission_status_id) REFERENCES mission_status (id)');
        $this->addSql('CREATE INDEX IDX_9067F23C547018DE ON mission (mission_type_id)');
        $this->addSql('CREATE INDEX IDX_9067F23CD942F794 ON mission (mission_status_id)');
    }
}
