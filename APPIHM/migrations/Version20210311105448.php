<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210311105448 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_commande DROP FOREIGN KEY FK_159D95766AF12ED9');
        $this->addSql('DROP INDEX IDX_159D95766AF12ED9 ON bon_commande');
        $this->addSql('ALTER TABLE bon_commande DROP valide_par_id');
        $this->addSql('ALTER TABLE y DROP FOREIGN KEY FK_FBDB2615B4B54061');
        $this->addSql('DROP INDEX IDX_FBDB2615B4B54061 ON y');
        $this->addSql('ALTER TABLE y CHANGE bon_commande_id bons_commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE y ADD CONSTRAINT FK_FBDB2615A316F5E9 FOREIGN KEY (bons_commande_id) REFERENCES bon_commande (id)');
        $this->addSql('CREATE INDEX IDX_FBDB2615A316F5E9 ON y (bons_commande_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_commande ADD valide_par_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bon_commande ADD CONSTRAINT FK_159D95766AF12ED9 FOREIGN KEY (valide_par_id) REFERENCES y (id)');
        $this->addSql('CREATE INDEX IDX_159D95766AF12ED9 ON bon_commande (valide_par_id)');
        $this->addSql('ALTER TABLE y DROP FOREIGN KEY FK_FBDB2615A316F5E9');
        $this->addSql('DROP INDEX IDX_FBDB2615A316F5E9 ON y');
        $this->addSql('ALTER TABLE y CHANGE bons_commande_id bon_commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE y ADD CONSTRAINT FK_FBDB2615B4B54061 FOREIGN KEY (bon_commande_id) REFERENCES bon_commande (id)');
        $this->addSql('CREATE INDEX IDX_FBDB2615B4B54061 ON y (bon_commande_id)');
    }
}
