<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210112113459 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recepten ADD medicijnen_id INT NOT NULL');
        $this->addSql('ALTER TABLE recepten ADD CONSTRAINT FK_72C1CA29FFC32E5 FOREIGN KEY (medicijnen_id) REFERENCES medicijnen (id)');
        $this->addSql('CREATE INDEX IDX_72C1CA29FFC32E5 ON recepten (medicijnen_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recepten DROP FOREIGN KEY FK_72C1CA29FFC32E5');
        $this->addSql('DROP INDEX IDX_72C1CA29FFC32E5 ON recepten');
        $this->addSql('ALTER TABLE recepten DROP medicijnen_id');
    }
}
