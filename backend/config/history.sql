--2017-12-09
-- $ php yii migrate --migrationPath=@yii/rbac/migrations

--2017-12-10
ALTER TABLE segpdf.`user` ADD `group` varchar(64) DEFAULT 'digma' NOT NULL COMMENT 'Grupo' ;
ALTER TABLE segpdf.`user` CHANGE `group` `group` varchar(64) DEFAULT 'digma' NOT NULL COMMENT 'Grupo' AFTER id_company;

--2017-12-11
ALTER TABLE segpdf.model_email ADD name varchar(100) NOT NULL ;
ALTER TABLE segpdf.model_email CHANGE name name varchar(100) NOT NULL AFTER id_company ;

--2017-12-16
ALTER TABLE segpdf.model_pdf_field_type ADD code varchar(100) NULL ;
ALTER TABLE segpdf.model_pdf_field_type CHANGE code code varchar(100) NULL AFTER id_company ;
UPDATE segpdf.model_pdf_field_type SET code='header' WHERE ID=1;
UPDATE segpdf.model_pdf_field_type SET code='coverage' WHERE ID=2
UPDATE segpdf.model_pdf_field_type SET code='franchise' WHERE ID=3
UPDATE segpdf.model_pdf_field_type SET code='condition_pay' WHERE ID=4

ALTER TABLE segpdf.model_pdf_field ADD keyword_start varchar(255) NULL ;
ALTER TABLE segpdf.model_pdf_field CHANGE keyword_start keyword_start varchar(255) NULL AFTER name;
ALTER TABLE segpdf.model_pdf_field ADD keyword_end varchar(255) NULL ;
ALTER TABLE segpdf.model_pdf_field CHANGE keyword_end keyword_end varchar(255) NULL AFTER keyword_start ;
ALTER TABLE segpdf.model_pdf_field DROP COLUMN keyword ;

--2017-12-19
ALTER TABLE segpdf.model_pdf_field ADD complemento varchar(100) NULL ;
ALTER TABLE segpdf.model_pdf_field CHANGE complemento complemento varchar(100) NULL AFTER keyword_end ;

--2017-12-20
ALTER TABLE segpdf.model_email ADD subject varchar(255) NULL ;
ALTER TABLE segpdf.model_email CHANGE subject subject varchar(255) NULL AFTER name ;
ALTER TABLE segpdf.model_email ADD from_name varchar(255) NULL ;
ALTER TABLE segpdf.model_email CHANGE from_name from_name varchar(255) NULL AFTER subject ;

--2017-12-23
ALTER TABLE segpdf.conf_email ADD `security` varchar(10) NULL ;
ALTER TABLE segpdf.conf_email CHANGE `security` `security` varchar(10) NULL AFTER port ;

-- adicionar manageHistory em grupo padrão

--2017-12-27
ALTER TABLE segpdf.model_pdf_field ADD `position` INT(11) UNSIGNED DEFAULT 0 NULL ;
ALTER TABLE segpdf.model_pdf_field CHANGE `position` `position` INT(11) UNSIGNED DEFAULT 0 NULL AFTER keyword_end ;

--2018-01-03
ALTER TABLE segpdf.model_pdf_field ADD position_line_value INT(11) UNSIGNED NULL ;
ALTER TABLE segpdf.model_pdf_field CHANGE position_line_value position_line_value INT(11) UNSIGNED NULL AFTER `position` ;

ALTER TABLE segpdf.model_pdf_field ADD line_value INT(11) UNSIGNED NULL ;
ALTER TABLE segpdf.model_pdf_field CHANGE line_value line_value INT(11) UNSIGNED NULL AFTER `position` ;

--2018-01-07
ALTER TABLE segpdf.model_pdf_field ADD qtde_words INT(11) UNSIGNED DEFAULT 0 NULL ;
ALTER TABLE segpdf.model_pdf_field CHANGE qtde_words qtde_words INT(11) UNSIGNED DEFAULT 0 NULL AFTER `position` ;
ALTER TABLE segpdf.model_pdf_field MODIFY COLUMN line_value int(11) unsigned DEFAULT 0 NULL ;
ALTER TABLE segpdf.model_pdf_field MODIFY COLUMN position_line_value int(11) unsigned DEFAULT 0 NULL ;
UPDATE segpdf.model_pdf_field SET line_value = 0 WHERE line_value IS NULL;
UPDATE segpdf.model_pdf_field SET position_line_value = 0 WHERE line_value IS NULL;
ALTER TABLE segpdf.model_pdf_field ADD end_finish_number char(1) DEFAULT 'N' NULL ;
ALTER TABLE segpdf.model_pdf_field CHANGE end_finish_number end_finish_number char(1) DEFAULT 'N' NULL AFTER `position` ;

-- Finalizar Busca no Final da Linha

-- 2018-01-30
ALTER TABLE segpdf.conf_email ADD id_user INT(11) UNSIGNED NULL ;
ALTER TABLE segpdf.conf_email CHANGE id_user id_user INT(11) UNSIGNED NULL AFTER id_company ;

ALTER TABLE segpdf.conf_email DROP FOREIGN KEY conf_email_user_FK ;
ALTER TABLE segpdf.conf_email ADD CONSTRAINT conf_email_user_FK FOREIGN KEY (id_user) REFERENCES segpdf.`user`(ID) ;

-- 2018-02-18
-- remover segundo modelo de e-mail
DELETE FROM model_email WHERE ID = 2;