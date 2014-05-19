CREATE TABLE `mnh_rest`.`treatment_classifications` (
  `tc_id` INT NOT NULL AUTO_INCREMENT,
  `tc_name` VARCHAR(45) NULL,
  PRIMARY KEY (`tc_id`));
INSERT INTO `mnh_rest`.`treatment_classifications` (`tc_name`, `tc_for`) VALUES ('Malaria', 'fev');
INSERT INTO `mnh_rest`.`treatment_classifications` (`tc_name`, `tc_for`) VALUES ('Fever No Malaria', 'fev');
