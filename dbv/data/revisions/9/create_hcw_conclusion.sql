CREATE TABLE `mnh_rest`.`hcw_conclusion` (
  `hc_id` INT NOT NULL,
  `hc_action_taken_supervisor` VARCHAR(45) NULL,
  `hc_action_taken_supervisee` VARCHAR(45) NULL,
  `hc_signature_supervisor` VARCHAR(45) NULL,
  `hc_signature_supervisee` VARCHAR(45) NULL,
  `hc_date_supervisor` VARCHAR(45) NULL,
  `hc_date_supervisee` VARCHAR(45) NULL,
  PRIMARY KEY (`hc_id`));
ALTER TABLE `mnh_rest`.`hcw_conclusion` 
ADD COLUMN `fac_mfl` INT(11) NULL AFTER `hc_date_supervisee`,
ADD COLUMN `ss_id` INT(11) NULL AFTER `fac_mfl`;