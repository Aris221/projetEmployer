<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180809111321 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE employer ADD departement1_id INT NOT NULL');
        $this->addSql('ALTER TABLE employer ADD CONSTRAINT FK_DE4CF0662CAFE910 FOREIGN KEY (departement1_id) REFERENCES departement (id)');
        $this->addSql('CREATE INDEX IDX_DE4CF0662CAFE910 ON employer (departement1_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE employer DROP FOREIGN KEY FK_DE4CF0662CAFE910');
        $this->addSql('DROP INDEX IDX_DE4CF0662CAFE910 ON employer');
        $this->addSql('ALTER TABLE employer DROP departement1_id');
    }
}
