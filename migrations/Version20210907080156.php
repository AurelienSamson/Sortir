<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210907080156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etats (no_etat INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(30) NOT NULL, PRIMARY KEY(no_etat)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscriptions (id INT AUTO_INCREMENT NOT NULL, sorties_no_sortie_id INT NOT NULL, participants_no_participant_id INT NOT NULL, date_inscription DATETIME NOT NULL, INDEX IDX_74E0281CD1F156C1 (sorties_no_sortie_id), INDEX IDX_74E0281CACA3F17D (participants_no_participant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieux (no_lieu INT AUTO_INCREMENT NOT NULL, villes_no_ville_id INT NOT NULL, nom_lieu VARCHAR(30) NOT NULL, rue VARCHAR(30) DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, INDEX IDX_9E44A8AE27E30153 (villes_no_ville_id), PRIMARY KEY(no_lieu)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participants (no_participant INT AUTO_INCREMENT NOT NULL, sites_no_site_id INT NOT NULL, pseudo VARCHAR(30) NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, telephone VARCHAR(15) DEFAULT NULL, mail VARCHAR(20) NOT NULL, mot_de_passe VARCHAR(20) NOT NULL, administrateur TINYINT(1) NOT NULL, actif TINYINT(1) NOT NULL, INDEX IDX_71697092DDF76323 (sites_no_site_id), PRIMARY KEY(no_participant)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sites (no_site INT AUTO_INCREMENT NOT NULL, nom_site VARCHAR(30) NOT NULL, PRIMARY KEY(no_site)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sorties (no_sortie INT AUTO_INCREMENT NOT NULL, organisateur_id INT NOT NULL, lieux_no_lieu_id INT NOT NULL, etats_no_etat_id INT NOT NULL, nom VARCHAR(30) NOT NULL, datedebut DATETIME NOT NULL, duree INT DEFAULT NULL, datecloture DATETIME NOT NULL, nbinscriptionmax INT NOT NULL, descriptioninfos LONGTEXT DEFAULT NULL, etatsortie INT DEFAULT NULL, urlphoto VARCHAR(250) DEFAULT NULL, INDEX IDX_488163E8D936B2FA (organisateur_id), INDEX IDX_488163E8171DE0C3 (lieux_no_lieu_id), INDEX IDX_488163E8A04E64FD (etats_no_etat_id), PRIMARY KEY(no_sortie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE villes (no_ville INT AUTO_INCREMENT NOT NULL, nom_ville VARCHAR(30) NOT NULL, code_postal VARCHAR(30) NOT NULL, PRIMARY KEY(no_ville)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inscriptions ADD CONSTRAINT FK_74E0281CD1F156C1 FOREIGN KEY (sorties_no_sortie_id) REFERENCES sorties (no_sortie)');
        $this->addSql('ALTER TABLE inscriptions ADD CONSTRAINT FK_74E0281CACA3F17D FOREIGN KEY (participants_no_participant_id) REFERENCES participants (no_participant)');
        $this->addSql('ALTER TABLE lieux ADD CONSTRAINT FK_9E44A8AE27E30153 FOREIGN KEY (villes_no_ville_id) REFERENCES villes (no_ville)');
        $this->addSql('ALTER TABLE participants ADD CONSTRAINT FK_71697092DDF76323 FOREIGN KEY (sites_no_site_id) REFERENCES sites (no_site)');
        $this->addSql('ALTER TABLE sorties ADD CONSTRAINT FK_488163E8D936B2FA FOREIGN KEY (organisateur_id) REFERENCES participants (no_participant)');
        $this->addSql('ALTER TABLE sorties ADD CONSTRAINT FK_488163E8171DE0C3 FOREIGN KEY (lieux_no_lieu_id) REFERENCES lieux (no_lieu)');
        $this->addSql('ALTER TABLE sorties ADD CONSTRAINT FK_488163E8A04E64FD FOREIGN KEY (etats_no_etat_id) REFERENCES etats (no_etat)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sorties DROP FOREIGN KEY FK_488163E8A04E64FD');
        $this->addSql('ALTER TABLE sorties DROP FOREIGN KEY FK_488163E8171DE0C3');
        $this->addSql('ALTER TABLE inscriptions DROP FOREIGN KEY FK_74E0281CACA3F17D');
        $this->addSql('ALTER TABLE sorties DROP FOREIGN KEY FK_488163E8D936B2FA');
        $this->addSql('ALTER TABLE participants DROP FOREIGN KEY FK_71697092DDF76323');
        $this->addSql('ALTER TABLE inscriptions DROP FOREIGN KEY FK_74E0281CD1F156C1');
        $this->addSql('ALTER TABLE lieux DROP FOREIGN KEY FK_9E44A8AE27E30153');
        $this->addSql('DROP TABLE etats');
        $this->addSql('DROP TABLE inscriptions');
        $this->addSql('DROP TABLE lieux');
        $this->addSql('DROP TABLE participants');
        $this->addSql('DROP TABLE sites');
        $this->addSql('DROP TABLE sorties');
        $this->addSql('DROP TABLE villes');
    }
}
