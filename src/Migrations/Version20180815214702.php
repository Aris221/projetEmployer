<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180815214702 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ceremonie (id INT AUTO_INCREMENT NOT NULL, information_id INT DEFAULT NULL, non_ceremonie VARCHAR(255) NOT NULL, INDEX IDX_F16BAF412EF03101 (information_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information (id INT AUTO_INCREMENT NOT NULL, employe_id INT NOT NULL, situation_matrimoniale_id INT DEFAULT NULL, type_heure_id INT DEFAULT NULL, adresse VARCHAR(255) NOT NULL, age INT NOT NULL, UNIQUE INDEX UNIQ_297918831B65292 (employe_id), INDEX IDX_297918834F36C624 (situation_matrimoniale_id), INDEX IDX_297918833F581417 (type_heure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langue (id INT AUTO_INCREMENT NOT NULL, information_id INT DEFAULT NULL, non_langue VARCHAR(255) NOT NULL, INDEX IDX_9357758E2EF03101 (information_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE situation_matrimoniale (id INT AUTO_INCREMENT NOT NULL, non_sm VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE travaille (id INT AUTO_INCREMENT NOT NULL, information_id INT DEFAULT NULL, non_travaille VARCHAR(255) NOT NULL, INDEX IDX_2A8DC5B2EF03101 (information_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_heure (id INT AUTO_INCREMENT NOT NULL, non_type_heure VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ceremonie ADD CONSTRAINT FK_F16BAF412EF03101 FOREIGN KEY (information_id) REFERENCES information (id)');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_297918831B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_297918834F36C624 FOREIGN KEY (situation_matrimoniale_id) REFERENCES situation_matrimoniale (id)');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_297918833F581417 FOREIGN KEY (type_heure_id) REFERENCES type_heure (id)');
        $this->addSql('ALTER TABLE langue ADD CONSTRAINT FK_9357758E2EF03101 FOREIGN KEY (information_id) REFERENCES information (id)');
        $this->addSql('ALTER TABLE travaille ADD CONSTRAINT FK_2A8DC5B2EF03101 FOREIGN KEY (information_id) REFERENCES information (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ceremonie DROP FOREIGN KEY FK_F16BAF412EF03101');
        $this->addSql('ALTER TABLE langue DROP FOREIGN KEY FK_9357758E2EF03101');
        $this->addSql('ALTER TABLE travaille DROP FOREIGN KEY FK_2A8DC5B2EF03101');
        $this->addSql('ALTER TABLE information DROP FOREIGN KEY FK_297918834F36C624');
        $this->addSql('ALTER TABLE information DROP FOREIGN KEY FK_297918833F581417');
        $this->addSql('DROP TABLE ceremonie');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE langue');
        $this->addSql('DROP TABLE situation_matrimoniale');
        $this->addSql('DROP TABLE travaille');
        $this->addSql('DROP TABLE type_heure');
    }
}
