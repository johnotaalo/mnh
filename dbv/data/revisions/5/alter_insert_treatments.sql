ALTER TABLE `mnh_rest`.`treatments` 
DROP INDEX `indicatorName` ;
ALTER TABLE `mnh_rest`.`treatments` 
ADD COLUMN `tc_id` INT(1) NULL AFTER `treatment_for`;
ALTER TABLE `mnh_rest`.`treatments` 
DROP COLUMN `tc_id`;

INSERT INTO `mnh_rest`.`treatments` (`treatment_name`, `treatment_code`, `treatment_for`) VALUES ('Amoxicillin', 'TRM07', 'pne');
INSERT INTO `mnh_rest`.`treatments` (`treatment_name`, `treatment_code`, `treatment_for`) VALUES ('Cotrimoxazole', 'TRM08', 'pne');
INSERT INTO `mnh_rest`.`treatments` (`treatment_name`, `treatment_code`, `treatment_for`) VALUES ('Others', 'TRM09', 'pne');
INSERT INTO `mnh_rest`.`treatments` (`treatment_name`, `treatment_code`, `treatment_for`) VALUES ('Referral for admission', 'TRM10', 'pne');
INSERT INTO `mnh_rest`.`treatments` (`treatment_name`, `treatment_code`, `treatment_for`) VALUES ('Referral for admission', 'TRM11', 'dia');
UPDATE `mnh_rest`.`treatments` SET `treatment_name`='Referral for admission(Pneumonia)' WHERE `treatment_id`='20';
UPDATE `mnh_rest`.`treatments` SET `treatment_name`='Referral for admission(Diarrhoea)' WHERE `treatment_id`='21';
UPDATE `mnh_rest`.`treatments` SET `treatment_name`='Others(Pne' WHERE `treatment_id`='19';
INSERT INTO `mnh_rest`.`treatments` (`treatment_name`, `treatment_code`, `treatment_for`) VALUES ('Artemether + Lumefantrine(AL)', 'TRM12', 'fev');
INSERT INTO `mnh_rest`.`treatments` (`treatment_name`, `treatment_code`, `treatment_for`) VALUES ('Artesunate Injection', 'TRM13', 'fev');
INSERT INTO `mnh_rest`.`treatments` (`treatment_name`, `treatment_code`, `treatment_for`) VALUES ('Chloramphenicol', 'TRM14', 'fev');
INSERT INTO `mnh_rest`.`treatments` (`treatment_name`, `treatment_code`, `treatment_for`) VALUES ('Paracetamol', 'TRM15', 'fev');
INSERT INTO `mnh_rest`.`treatments` (`treatment_name`, `treatment_code`, `treatment_for`) VALUES ('Quinine', 'TRM16', 'fev');
INSERT INTO `mnh_rest`.`treatments` (`treatment_name`, `treatment_code`, `treatment_for`) VALUES ('Others', 'TRM17', 'fev');
INSERT INTO `mnh_rest`.`treatments` (`treatment_name`, `treatment_code`, `treatment_for`) VALUES ('Referral for Admission', 'TRM18', 'fev');
