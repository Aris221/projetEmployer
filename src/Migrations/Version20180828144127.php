<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180828144127 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE enregistre (id INT AUTO_INCREMENT NOT NULL, employe_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_FC6E63581B65292 (employe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE enregistre ADD CONSTRAINT FK_FC6E63581B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('DROP TABLE employer');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE employer (id INT AUTO_INCREMENT NOT NULL, nationalite_id INT NOT NULL, niveau_etude_id INT NOT NULL, departement_id INT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, age INT NOT NULL, situation_matrimoniale VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, telephone VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, experience VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, periode_travail VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_DE4CF0661B063272 (nationalite_id), INDEX IDX_DE4CF066FEAD13D1 (niveau_etude_id), INDEX IDX_DE4CF066CCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employer ADD CONSTRAINT FK_DE4CF0661B063272 FOREIGN KEY (nationalite_id) REFERENCES nationalite (id)');
        $this->addSql('ALTER TABLE employer ADD CONSTRAINT FK_DE4CF066CCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE employer ADD CONSTRAINT FK_DE4CF066FEAD13D1 FOREIGN KEY (niveau_etude_id) REFERENCES niveau_etude (id)');
        $this->addSql('DROP TABLE enregistre');
    }
}
