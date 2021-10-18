<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007125651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission ADD admin_id INT NOT NULL, ADD agent_id INT NOT NULL, ADD specialite_id INT NOT NULL, ADD statut_id INT NOT NULL, ADD types_mission_id INT NOT NULL, ADD planque_id INT NOT NULL, ADD contact_id INT NOT NULL, ADD cible_id INT NOT NULL, ADD nationalite_id INT NOT NULL');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C642B8210 FOREIGN KEY (admin_id) REFERENCES administrateur (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C3414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CF6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C8B051F00 FOREIGN KEY (types_mission_id) REFERENCES types_mission (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CCE8A20B FOREIGN KEY (planque_id) REFERENCES planque (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CA96E5E09 FOREIGN KEY (cible_id) REFERENCES cible (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C1B063272 FOREIGN KEY (nationalite_id) REFERENCES nationalite (id)');
        $this->addSql('CREATE INDEX IDX_9067F23C642B8210 ON mission (admin_id)');
        $this->addSql('CREATE INDEX IDX_9067F23C3414710B ON mission (agent_id)');
        $this->addSql('CREATE INDEX IDX_9067F23C2195E0F0 ON mission (specialite_id)');
        $this->addSql('CREATE INDEX IDX_9067F23CF6203804 ON mission (statut_id)');
        $this->addSql('CREATE INDEX IDX_9067F23C8B051F00 ON mission (types_mission_id)');
        $this->addSql('CREATE INDEX IDX_9067F23CCE8A20B ON mission (planque_id)');
        $this->addSql('CREATE INDEX IDX_9067F23CE7A1254A ON mission (contact_id)');
        $this->addSql('CREATE INDEX IDX_9067F23CA96E5E09 ON mission (cible_id)');
        $this->addSql('CREATE INDEX IDX_9067F23C1B063272 ON mission (nationalite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C642B8210');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C3414710B');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C2195E0F0');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CF6203804');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C8B051F00');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CCE8A20B');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CE7A1254A');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CA96E5E09');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C1B063272');
        $this->addSql('DROP INDEX IDX_9067F23C642B8210 ON mission');
        $this->addSql('DROP INDEX IDX_9067F23C3414710B ON mission');
        $this->addSql('DROP INDEX IDX_9067F23C2195E0F0 ON mission');
        $this->addSql('DROP INDEX IDX_9067F23CF6203804 ON mission');
        $this->addSql('DROP INDEX IDX_9067F23C8B051F00 ON mission');
        $this->addSql('DROP INDEX IDX_9067F23CCE8A20B ON mission');
        $this->addSql('DROP INDEX IDX_9067F23CE7A1254A ON mission');
        $this->addSql('DROP INDEX IDX_9067F23CA96E5E09 ON mission');
        $this->addSql('DROP INDEX IDX_9067F23C1B063272 ON mission');
        $this->addSql('ALTER TABLE mission DROP admin_id, DROP agent_id, DROP specialite_id, DROP statut_id, DROP types_mission_id, DROP planque_id, DROP contact_id, DROP cible_id, DROP nationalite_id');
    }
}
