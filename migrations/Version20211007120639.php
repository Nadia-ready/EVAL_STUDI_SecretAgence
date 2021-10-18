<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007120639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, code_identification INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('ALTER TABLE nationalite ADD agent_id INT NOT NULL');
        //$this->addSql('ALTER TABLE nationalite ADD CONSTRAINT FK_9EC4D73F3414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        //$this->addSql('CREATE INDEX IDX_9EC4D73F3414710B ON nationalite (agent_id)');
        //$this->addSql('ALTER TABLE specialite ADD agent_id INT NOT NULL');
        //$this->addSql('ALTER TABLE specialite ADD CONSTRAINT FK_E7D6FCC13414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        //$this->addSql('CREATE INDEX IDX_E7D6FCC13414710B ON specialite (agent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE nationalite DROP FOREIGN KEY FK_9EC4D73F3414710B');
        //$this->addSql('ALTER TABLE specialite DROP FOREIGN KEY FK_E7D6FCC13414710B');
        //$this->addSql('DROP TABLE agent');
        //$this->addSql('DROP INDEX IDX_9EC4D73F3414710B ON nationalite');
        //$this->addSql('ALTER TABLE nationalite DROP agent_id');
        //$this->addSql('DROP INDEX IDX_E7D6FCC13414710B ON specialite');
        //$this->addSql('ALTER TABLE specialite DROP agent_id');
    }
}
