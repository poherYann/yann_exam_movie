<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212140544 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acteurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acteurs_films (acteurs_id INT NOT NULL, films_id INT NOT NULL, INDEX IDX_863F484B71A27AFC (acteurs_id), INDEX IDX_863F484B939610EE (films_id), PRIMARY KEY(acteurs_id, films_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE films (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, nom VARCHAR(255) NOT NULL, annee INT NOT NULL, INDEX IDX_CEECCA51BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acteurs_films ADD CONSTRAINT FK_863F484B71A27AFC FOREIGN KEY (acteurs_id) REFERENCES acteurs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acteurs_films ADD CONSTRAINT FK_863F484B939610EE FOREIGN KEY (films_id) REFERENCES films (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films ADD CONSTRAINT FK_CEECCA51BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acteurs_films DROP FOREIGN KEY FK_863F484B71A27AFC');
        $this->addSql('ALTER TABLE films DROP FOREIGN KEY FK_CEECCA51BCF5E72D');
        $this->addSql('ALTER TABLE acteurs_films DROP FOREIGN KEY FK_863F484B939610EE');
        $this->addSql('DROP TABLE acteurs');
        $this->addSql('DROP TABLE acteurs_films');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE films');
    }
}
