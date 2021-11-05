<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021194410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent_agent (agent_source INT NOT NULL, agent_target INT NOT NULL, INDEX IDX_1F25B4E516D2855 (agent_source), INDEX IDX_1F25B4E5188878DA (agent_target), PRIMARY KEY(agent_source, agent_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent_agent ADD CONSTRAINT FK_1F25B4E516D2855 FOREIGN KEY (agent_source) REFERENCES agent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agent_agent ADD CONSTRAINT FK_1F25B4E5188878DA FOREIGN KEY (agent_target) REFERENCES agent (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE agent_agent');
    }
}
