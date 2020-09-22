<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200922225230 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE functie_to_person (id INT AUTO_INCREMENT NOT NULL, functie_id_id INT DEFAULT NULL, jaartal INT NOT NULL, functie_id INT NOT NULL, INDEX IDX_B5DDE6A1DA222ECB (functie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE functie_to_person_user (functie_to_person_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7206F20E4EBD08D1 (functie_to_person_id), INDEX IDX_7206F20EA76ED395 (user_id), PRIMARY KEY(functie_to_person_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE functies (id INT AUTO_INCREMENT NOT NULL, functie_id INT NOT NULL, titel VARCHAR(255) NOT NULL, beschrijving VARCHAR(1023) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE functie_to_person ADD CONSTRAINT FK_B5DDE6A1DA222ECB FOREIGN KEY (functie_id_id) REFERENCES functies (id)');
        $this->addSql('ALTER TABLE functie_to_person_user ADD CONSTRAINT FK_7206F20E4EBD08D1 FOREIGN KEY (functie_to_person_id) REFERENCES functie_to_person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE functie_to_person_user ADD CONSTRAINT FK_7206F20EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE functie_to_person_user DROP FOREIGN KEY FK_7206F20E4EBD08D1');
        $this->addSql('ALTER TABLE functie_to_person DROP FOREIGN KEY FK_B5DDE6A1DA222ECB');
        $this->addSql('DROP TABLE functie_to_person');
        $this->addSql('DROP TABLE functie_to_person_user');
        $this->addSql('DROP TABLE functies');
    }
}
