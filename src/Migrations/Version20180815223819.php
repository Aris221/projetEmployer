<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180815223819 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ceremonie (id INT AUTO_INCREMENT NOT NULL, nom_ceremonie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information (id INT AUTO_INCREMENT NOT NULL, employer_id INT DEFAULT NULL, sm_id INT DEFAULT NULL, type_heure_id INT DEFAULT NULL, niveau_etude_id INT DEFAULT NULL, adresse VARCHAR(255) NOT NULL, age VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2979188341CD9E7A (employer_id), INDEX IDX_29791883281C5EFE (sm_id), INDEX IDX_297918833F581417 (type_heure_id), INDEX IDX_29791883FEAD13D1 (niveau_etude_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_langue (information_id INT NOT NULL, langue_id INT NOT NULL, INDEX IDX_15E7809E2EF03101 (information_id), INDEX IDX_15E7809E2AADBACD (langue_id), PRIMARY KEY(information_id, langue_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_travaille (information_id INT NOT NULL, travaille_id INT NOT NULL, INDEX IDX_BC24D9D92EF03101 (information_id), INDEX IDX_BC24D9D9F328A5AA (travaille_id), PRIMARY KEY(information_id, travaille_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_ceremonie (information_id INT NOT NULL, ceremonie_id INT NOT NULL, INDEX IDX_4FE7AAC32EF03101 (information_id), INDEX IDX_4FE7AAC3E4E63AC0 (ceremonie_id), PRIMARY KEY(information_id, ceremonie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langue (id INT AUTO_INCREMENT NOT NULL, non_langue VARCHAR(255) NOT NULL, situation_matrimoniale VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stuation_matrimoniale (id INT AUTO_INCREMENT NOT NULL, non_sm VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE travaille (id INT AUTO_INCREMENT NOT NULL, non_travaille VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_heure (id INT AUTO_INCREMENT NOT NULL, non_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_2979188341CD9E7A FOREIGN KEY (employer_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_29791883281C5EFE FOREIGN KEY (sm_id) REFERENCES stuation_matrimoniale (id)');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_297918833F581417 FOREIGN KEY (type_heure_id) REFERENCES type_heure (id)');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_29791883FEAD13D1 FOREIGN KEY (niveau_etude_id) REFERENCES niveau_etude (id)');
        $this->addSql('ALTER TABLE information_langue ADD CONSTRAINT FK_15E7809E2EF03101 FOREIGN KEY (information_id) REFERENCES information (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE information_langue ADD CONSTRAINT FK_15E7809E2AADBACD FOREIGN KEY (langue_id) REFERENCES langue (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE information_travaille ADD CONSTRAINT FK_BC24D9D92EF03101 FOREIGN KEY (information_id) REFERENCES information (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE information_travaille ADD CONSTRAINT FK_BC24D9D9F328A5AA FOREIGN KEY (travaille_id) REFERENCES travaille (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE information_ceremonie ADD CONSTRAINT FK_4FE7AAC32EF03101 FOREIGN KEY (information_id) REFERENCES information (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE information_ceremonie ADD CONSTRAINT FK_4FE7AAC3E4E63AC0 FOREIGN KEY (ceremonie_id) REFERENCES ceremonie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE information_ceremonie DROP FOREIGN KEY FK_4FE7AAC3E4E63AC0');
        $this->addSql('ALTER TABLE information_langue DROP FOREIGN KEY FK_15E7809E2EF03101');
        $this->addSql('ALTER TABLE information_travaille DROP FOREIGN KEY FK_BC24D9D92EF03101');
        $this->addSql('ALTER TABLE information_ceremonie DROP FOREIGN KEY FK_4FE7AAC32EF03101');
        $this->addSql('ALTER TABLE information_langue DROP FOREIGN KEY FK_15E7809E2AADBACD');
        $this->addSql('ALTER TABLE information DROP FOREIGN KEY FK_29791883281C5EFE');
        $this->addSql('ALTER TABLE information_travaille DROP FOREIGN KEY FK_BC24D9D9F328A5AA');
        $this->addSql('ALTER TABLE information DROP FOREIGN KEY FK_297918833F581417');
        $this->addSql('DROP TABLE ceremonie');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE information_langue');
        $this->addSql('DROP TABLE information_travaille');
        $this->addSql('DROP TABLE information_ceremonie');
        $this->addSql('DROP TABLE langue');
        $this->addSql('DROP TABLE stuation_matrimoniale');
        $this->addSql('DROP TABLE travaille');
        $this->addSql('DROP TABLE type_heure');
    }
}
