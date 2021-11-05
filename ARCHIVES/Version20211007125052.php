<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007125052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_passe VARCHAR(255) NOT NULL, date_creation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE administrateur_role (administrateur_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_3B2BDA767EE5403C (administrateur_id), INDEX IDX_3B2BDA76D60322AC (role_id), PRIMARY KEY(administrateur_id, role_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE administrateur_role ADD CONSTRAINT FK_3B2BDA767EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE administrateur_role ADD CONSTRAINT FK_3B2BDA76D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur_role DROP FOREIGN KEY FK_3B2BDA767EE5403C');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE administrateur_role');
    }
}
