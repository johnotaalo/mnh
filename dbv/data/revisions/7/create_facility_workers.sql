CREATE TABLE `mnh_rest`.`facility_workers` (
  `fw_id` INT NOT NULL AUTO_INCREMENT,
  `fw_first_name` VARCHAR(45) NULL,
  `fw_last_name` VARCHAR(45) NULL,
  `fw_national_id` VARCHAR(45) NULL,
  `fw_personel_id` VARCHAR(45) NULL,
  `fw_phone_number` VARCHAR(45) NULL,
  `fw_year_month_trained` VARCHAR(45) NULL,
  `fw_coordinator` VARCHAR(45) NULL,
  `fw_designation` VARCHAR(45) NULL,
  `fac_mfl` INT(11) NULL,
  `ss_id` INT(11) NULL,
  PRIMARY KEY (`fw_id`));

ALTER TABLE `mnh_rest`.`facility_workers` 
ADD COLUMN `fw_updated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP AFTER `fw_designation`;
