<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200129150034 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE place_event');
        $this->addSql('ALTER TABLE event ADD agenda_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7EA67784A FOREIGN KEY (agenda_id) REFERENCES agenda (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7EA67784A ON event (agenda_id)');
        $this->addSql('ALTER TABLE agenda ADD date_time DATETIME NOT NULL');
        $this->addSql('ALTER TABLE place ADD name VARCHAR(255) NOT NULL, CHANGE agenda_id agenda_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE place_event (place_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_92D8118471F7E88B (event_id), INDEX IDX_92D81184DA6A219 (place_id), PRIMARY KEY(place_id, event_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE place_event ADD CONSTRAINT FK_92D8118471F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_event ADD CONSTRAINT FK_92D81184DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agenda DROP date_time');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7EA67784A');
        $this->addSql('DROP INDEX IDX_3BAE0AA7EA67784A ON event');
        $this->addSql('ALTER TABLE event DROP agenda_id');
        $this->addSql('ALTER TABLE place DROP name, CHANGE agenda_id agenda_id INT NOT NULL');
    }
}
