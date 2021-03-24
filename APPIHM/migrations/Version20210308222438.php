<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308222438 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_commande ADD valide_par_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bon_commande ADD CONSTRAINT FK_159D95766AF12ED9 FOREIGN KEY (valide_par_id) REFERENCES y (id)');
        $this->addSql('CREATE INDEX IDX_159D95766AF12ED9 ON bon_commande (valide_par_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_commande DROP FOREIGN KEY FK_159D95766AF12ED9');
        $this->addSql('DROP INDEX IDX_159D95766AF12ED9 ON bon_commande');
        $this->addSql('ALTER TABLE bon_commande DROP valide_par_id');
    }
}
