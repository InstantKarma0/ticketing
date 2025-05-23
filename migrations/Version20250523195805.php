<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250523195805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, address1 VARCHAR(255) NOT NULL, address2 VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, town VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_4FBF094FB03A8386 (created_by_id), INDEX IDX_4FBF094F896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE log (id INT AUTO_INCREMENT NOT NULL, ref_ticket_id INT NOT NULL, ref_status_before_id INT DEFAULT NULL, ref_status_after_id INT NOT NULL, ref_log_action_id INT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_8F3F68C535A4697 (ref_ticket_id), INDEX IDX_8F3F68C5556AAE9D (ref_status_before_id), INDEX IDX_8F3F68C557AE934 (ref_status_after_id), INDEX IDX_8F3F68C5AF603BDB (ref_log_action_id), INDEX IDX_8F3F68C5B03A8386 (created_by_id), INDEX IDX_8F3F68C5896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE log_action (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_5236DF30B03A8386 (created_by_id), INDEX IDX_5236DF30896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE notification_type (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_34E21C13B03A8386 (created_by_id), INDEX IDX_34E21C13896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, ref_ticket_type_id INT NOT NULL, ref_ticket_priority_id INT DEFAULT NULL, ref_ticket_status_id INT NOT NULL, ref_technician_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_97A0ADA38416E4CE (ref_ticket_type_id), INDEX IDX_97A0ADA3775790C6 (ref_ticket_priority_id), INDEX IDX_97A0ADA3278B8B94 (ref_ticket_status_id), INDEX IDX_97A0ADA3C29583F6 (ref_technician_id), INDEX IDX_97A0ADA3B03A8386 (created_by_id), INDEX IDX_97A0ADA3896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ticket_comment (id INT AUTO_INCREMENT NOT NULL, ref_ticket_id INT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_98B80B3E35A4697 (ref_ticket_id), INDEX IDX_98B80B3EB03A8386 (created_by_id), INDEX IDX_98B80B3E896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ticket_media (id INT AUTO_INCREMENT NOT NULL, ref_ticket_id INT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, file VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_421CC28735A4697 (ref_ticket_id), INDEX IDX_421CC287B03A8386 (created_by_id), INDEX IDX_421CC287896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ticket_priority (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_E7CF20A6B03A8386 (created_by_id), INDEX IDX_E7CF20A6896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ticket_status (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_1420FD7B03A8386 (created_by_id), INDEX IDX_1420FD7896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ticket_type (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_BE054211B03A8386 (created_by_id), INDEX IDX_BE054211896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, ref_user_profile_id INT NOT NULL, ref_company_id INT NOT NULL, ref_notification_type_id INT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, phone VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_8D93D649FB6F5FF4 (ref_user_profile_id), INDEX IDX_8D93D649915EF5C8 (ref_company_id), INDEX IDX_8D93D6495D2C852C (ref_notification_type_id), INDEX IDX_8D93D649B03A8386 (created_by_id), INDEX IDX_8D93D649896DBBDE (updated_by_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user_authenticator (id INT AUTO_INCREMENT NOT NULL, ref_user_id INT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, secret VARCHAR(255) NOT NULL, validate_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_B46A9DDF637A8045 (ref_user_id), INDEX IDX_B46A9DDFB03A8386 (created_by_id), INDEX IDX_B46A9DDF896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user_password_request (id INT AUTO_INCREMENT NOT NULL, ref_user_id INT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, uniq_id BINARY(16) NOT NULL COMMENT '(DC2Type:uuid)', expire_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_6E0D9C4DCF63803F (uniq_id), INDEX IDX_6E0D9C4D637A8045 (ref_user_id), INDEX IDX_6E0D9C4DB03A8386 (created_by_id), INDEX IDX_6E0D9C4D896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user_profile (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_D95AB405B03A8386 (created_by_id), INDEX IDX_D95AB405896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user_token (id INT AUTO_INCREMENT NOT NULL, ref_user_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, long_token VARCHAR(80) NOT NULL, short_token VARCHAR(20) NOT NULL, short_token_expire_at DATETIME NOT NULL, long_token_expire_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_BDF55A634436EE1B (long_token), UNIQUE INDEX UNIQ_BDF55A63DF32013E (short_token), INDEX IDX_BDF55A63637A8045 (ref_user_id), INDEX IDX_BDF55A63B03A8386 (created_by_id), INDEX IDX_BDF55A63896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE company ADD CONSTRAINT FK_4FBF094FB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE company ADD CONSTRAINT FK_4FBF094F896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log ADD CONSTRAINT FK_8F3F68C535A4697 FOREIGN KEY (ref_ticket_id) REFERENCES ticket (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log ADD CONSTRAINT FK_8F3F68C5556AAE9D FOREIGN KEY (ref_status_before_id) REFERENCES ticket_status (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log ADD CONSTRAINT FK_8F3F68C557AE934 FOREIGN KEY (ref_status_after_id) REFERENCES ticket_status (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log ADD CONSTRAINT FK_8F3F68C5AF603BDB FOREIGN KEY (ref_log_action_id) REFERENCES log_action (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log ADD CONSTRAINT FK_8F3F68C5B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log ADD CONSTRAINT FK_8F3F68C5896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log_action ADD CONSTRAINT FK_5236DF30B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log_action ADD CONSTRAINT FK_5236DF30896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification_type ADD CONSTRAINT FK_34E21C13B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification_type ADD CONSTRAINT FK_34E21C13896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA38416E4CE FOREIGN KEY (ref_ticket_type_id) REFERENCES ticket_type (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3775790C6 FOREIGN KEY (ref_ticket_priority_id) REFERENCES ticket_priority (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3278B8B94 FOREIGN KEY (ref_ticket_status_id) REFERENCES ticket_status (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3C29583F6 FOREIGN KEY (ref_technician_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_comment ADD CONSTRAINT FK_98B80B3E35A4697 FOREIGN KEY (ref_ticket_id) REFERENCES ticket (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_comment ADD CONSTRAINT FK_98B80B3EB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_comment ADD CONSTRAINT FK_98B80B3E896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_media ADD CONSTRAINT FK_421CC28735A4697 FOREIGN KEY (ref_ticket_id) REFERENCES ticket (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_media ADD CONSTRAINT FK_421CC287B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_media ADD CONSTRAINT FK_421CC287896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_priority ADD CONSTRAINT FK_E7CF20A6B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_priority ADD CONSTRAINT FK_E7CF20A6896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_status ADD CONSTRAINT FK_1420FD7B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_status ADD CONSTRAINT FK_1420FD7896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_type ADD CONSTRAINT FK_BE054211B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_type ADD CONSTRAINT FK_BE054211896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD CONSTRAINT FK_8D93D649FB6F5FF4 FOREIGN KEY (ref_user_profile_id) REFERENCES user_profile (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD CONSTRAINT FK_8D93D649915EF5C8 FOREIGN KEY (ref_company_id) REFERENCES company (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD CONSTRAINT FK_8D93D6495D2C852C FOREIGN KEY (ref_notification_type_id) REFERENCES notification_type (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD CONSTRAINT FK_8D93D649B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD CONSTRAINT FK_8D93D649896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_authenticator ADD CONSTRAINT FK_B46A9DDF637A8045 FOREIGN KEY (ref_user_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_authenticator ADD CONSTRAINT FK_B46A9DDFB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_authenticator ADD CONSTRAINT FK_B46A9DDF896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_password_request ADD CONSTRAINT FK_6E0D9C4D637A8045 FOREIGN KEY (ref_user_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_password_request ADD CONSTRAINT FK_6E0D9C4DB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_password_request ADD CONSTRAINT FK_6E0D9C4D896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB405B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB405896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_token ADD CONSTRAINT FK_BDF55A63637A8045 FOREIGN KEY (ref_user_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_token ADD CONSTRAINT FK_BDF55A63B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_token ADD CONSTRAINT FK_BDF55A63896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FB03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log DROP FOREIGN KEY FK_8F3F68C535A4697
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log DROP FOREIGN KEY FK_8F3F68C5556AAE9D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log DROP FOREIGN KEY FK_8F3F68C557AE934
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log DROP FOREIGN KEY FK_8F3F68C5AF603BDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log DROP FOREIGN KEY FK_8F3F68C5B03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log DROP FOREIGN KEY FK_8F3F68C5896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log_action DROP FOREIGN KEY FK_5236DF30B03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log_action DROP FOREIGN KEY FK_5236DF30896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification_type DROP FOREIGN KEY FK_34E21C13B03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE notification_type DROP FOREIGN KEY FK_34E21C13896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA38416E4CE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3775790C6
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3278B8B94
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3C29583F6
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3B03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_comment DROP FOREIGN KEY FK_98B80B3E35A4697
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_comment DROP FOREIGN KEY FK_98B80B3EB03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_comment DROP FOREIGN KEY FK_98B80B3E896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_media DROP FOREIGN KEY FK_421CC28735A4697
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_media DROP FOREIGN KEY FK_421CC287B03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_media DROP FOREIGN KEY FK_421CC287896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_priority DROP FOREIGN KEY FK_E7CF20A6B03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_priority DROP FOREIGN KEY FK_E7CF20A6896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_status DROP FOREIGN KEY FK_1420FD7B03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_status DROP FOREIGN KEY FK_1420FD7896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_type DROP FOREIGN KEY FK_BE054211B03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_type DROP FOREIGN KEY FK_BE054211896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FB6F5FF4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user DROP FOREIGN KEY FK_8D93D649915EF5C8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495D2C852C
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user DROP FOREIGN KEY FK_8D93D649896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_authenticator DROP FOREIGN KEY FK_B46A9DDF637A8045
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_authenticator DROP FOREIGN KEY FK_B46A9DDFB03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_authenticator DROP FOREIGN KEY FK_B46A9DDF896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_password_request DROP FOREIGN KEY FK_6E0D9C4D637A8045
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_password_request DROP FOREIGN KEY FK_6E0D9C4DB03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_password_request DROP FOREIGN KEY FK_6E0D9C4D896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_profile DROP FOREIGN KEY FK_D95AB405B03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_profile DROP FOREIGN KEY FK_D95AB405896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_token DROP FOREIGN KEY FK_BDF55A63637A8045
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_token DROP FOREIGN KEY FK_BDF55A63B03A8386
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_token DROP FOREIGN KEY FK_BDF55A63896DBBDE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE company
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE log
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE log_action
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE notification_type
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ticket
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ticket_comment
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ticket_media
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ticket_priority
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ticket_status
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ticket_type
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user_authenticator
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user_password_request
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user_profile
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user_token
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
