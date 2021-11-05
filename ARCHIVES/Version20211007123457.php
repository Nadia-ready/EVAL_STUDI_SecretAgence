<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007123457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent ADD nationalite_id INT NOT NULL, ADD specialité_id INT NOT NULL, DROP nationalite');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9D1B063272 FOREIGN KEY (nationalite_id) REFERENCES nationalite (id)');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9DEC63E912 FOREIGN KEY (specialité_id) REFERENCES specialite (id)');
        $this->addSql('CREATE INDEX IDX_268B9C9D1B063272 ON agent (nationalite_id)');
        $this->addSql('CREATE INDEX IDX_268B9C9DEC63E912 ON agent (specialité_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9D1B063272');
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9DEC63E912');
        $this->addSql('DROP INDEX IDX_268B9C9D1B063272 ON agent');
        $this->addSql('DROP INDEX IDX_268B9C9DEC63E912 ON agent');
        $this->addSql('ALTER TABLE agent ADD nationalite VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP nationalite_id, DROP specialité_id');
    }
}
