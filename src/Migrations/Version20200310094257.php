<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200310094257 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commond_job_position CHANGE parent parent VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE nd_approver ADD refid_id INT NOT NULL');
        $this->addSql('ALTER TABLE nd_approver ADD CONSTRAINT FK_F163945A3512AFCB FOREIGN KEY (refid_id) REFERENCES nd_surat (id)');
        $this->addSql('CREATE INDEX IDX_F163945A3512AFCB ON nd_approver (refid_id)');
        $this->addSql('ALTER TABLE nd_attachment CHANGE nama_file nama_file VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE nd_history CHANGE komentar komentar VARCHAR(255) DEFAULT NULL, CHANGE aksi aksi VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE nd_surat CHANGE no_surat_rt no_surat_rt VARCHAR(255) DEFAULT NULL, CHANGE no_surat_rw no_surat_rw VARCHAR(255) DEFAULT NULL, CHANGE no_surat_lurah no_surat_lurah VARCHAR(255) DEFAULT NULL, CHANGE body_surat body_surat VARCHAR(255) DEFAULT NULL, CHANGE no_surat_keterangan no_surat_keterangan INT DEFAULT NULL, CHANGE keterangan keterangan VARCHAR(255) DEFAULT NULL, CHANGE tgl_selesai_rt tgl_selesai_rt DATETIME DEFAULT NULL, CHANGE tgl_selesai_rw tgl_selesai_rw DATETIME DEFAULT NULL, CHANGE tgl_selesai_kelurahan tgl_selesai_kelurahan DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE token token VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commond_job_position CHANGE parent parent VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nd_approver DROP FOREIGN KEY FK_F163945A3512AFCB');
        $this->addSql('DROP INDEX IDX_F163945A3512AFCB ON nd_approver');
        $this->addSql('ALTER TABLE nd_approver DROP refid_id');
        $this->addSql('ALTER TABLE nd_attachment CHANGE nama_file nama_file VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nd_history CHANGE komentar komentar VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE aksi aksi VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nd_surat CHANGE no_surat_rt no_surat_rt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE no_surat_rw no_surat_rw VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE no_surat_lurah no_surat_lurah VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE body_surat body_surat VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE no_surat_keterangan no_surat_keterangan INT DEFAULT NULL, CHANGE keterangan keterangan VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE tgl_selesai_rt tgl_selesai_rt DATETIME DEFAULT \'NULL\', CHANGE tgl_selesai_rw tgl_selesai_rw DATETIME DEFAULT \'NULL\', CHANGE tgl_selesai_kelurahan tgl_selesai_kelurahan DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE token token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
