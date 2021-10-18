<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007122921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent ADD nationalite VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE nationalite DROP FOREIGN KEY FK_9EC4D73F3414710B');
        $this->addSql('DROP INDEX IDX_9EC4D73F3414710B ON nationalite');
        $this->addSql('ALTER TABLE nationalite DROP agent_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent DROP nationalite');
        $this->addSql('ALTER TABLE nationalite ADD agent_id INT NOT NULL');
        $this->addSql('ALTER TABLE nationalite ADD CONSTRAINT FK_9EC4D73F3414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        $this->addSql('CREATE INDEX IDX_9EC4D73F3414710B ON nationalite (agent_id)');
    }
}
