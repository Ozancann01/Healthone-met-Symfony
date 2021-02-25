<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210114124133 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recepten ADD patienten_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recepten ADD CONSTRAINT FK_72C1CA21BDAEE1 FOREIGN KEY (patienten_id) REFERENCES patienten (id)');
        $this->addSql('CREATE INDEX IDX_72C1CA21BDAEE1 ON recepten (patienten_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recepten DROP FOREIGN KEY FK_72C1CA21BDAEE1');
        $this->addSql('DROP INDEX IDX_72C1CA21BDAEE1 ON recepten');
        $this->addSql('ALTER TABLE recepten DROP patienten_id');
    }
}
