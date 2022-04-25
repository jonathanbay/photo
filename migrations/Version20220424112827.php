<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220424112827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accueil_animaux ADD is_valid TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE accueil_enfant ADD is_valid TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE accueil_evenement ADD is_valid TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE accueil_famille ADD is_valid TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accueil_animaux DROP is_valid');
        $this->addSql('ALTER TABLE accueil_enfant DROP is_valid');
        $this->addSql('ALTER TABLE accueil_evenement DROP is_valid');
        $this->addSql('ALTER TABLE accueil_famille DROP is_valid');
    }
}
