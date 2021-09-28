<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210928122106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mission_speciality (mission_id INT NOT NULL, speciality_id INT NOT NULL, INDEX IDX_B1D78D15BE6CAE90 (mission_id), INDEX IDX_B1D78D153B5A08D7 (speciality_id), PRIMARY KEY(mission_id, speciality_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE safe_house_mission (safe_house_id INT NOT NULL, mission_id INT NOT NULL, INDEX IDX_D18448E9976CF13B (safe_house_id), INDEX IDX_D18448E9BE6CAE90 (mission_id), PRIMARY KEY(safe_house_id, mission_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mission_speciality ADD CONSTRAINT FK_B1D78D15BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_speciality ADD CONSTRAINT FK_B1D78D153B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE safe_house_mission ADD CONSTRAINT FK_D18448E9976CF13B FOREIGN KEY (safe_house_id) REFERENCES safe_house (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE safe_house_mission ADD CONSTRAINT FK_D18448E9BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mission_speciality');
        $this->addSql('DROP TABLE safe_house_mission');
    }
}
