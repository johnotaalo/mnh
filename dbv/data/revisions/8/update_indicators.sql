UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='duration' WHERE `indicator_id`='24';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='duration' WHERE `indicator_id`='25';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='present;not present' WHERE `indicator_id`='26';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='present;not present' WHERE `indicator_id`='27';
UPDATE `mnh_rest`.`indicators` SET `indicator_for`='ear' WHERE `indicator_id`='60';
INSERT INTO `mnh_rest`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`, `indicator_findings`) VALUES ('Looked and listened for a wheeze', 'CHI63', 'pne', 'present;not present');
INSERT INTO `mnh_rest`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`, `indicator_findings`) VALUES ('Classification Done', 'CHI64', 'pne', 'No pneumonia/cough or cold;pneumonia;severe pneumonia/very severe disease');
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='duration' WHERE `indicator_id`='29';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='degrees' WHERE `indicator_id`='30';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='present;not present' WHERE `indicator_id`='31';
INSERT INTO `mnh_rest`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`, `indicator_findings`) VALUES ('Malaria Blood Tested', 'CHI65', 'fev', 'positive;negative');
INSERT INTO `mnh_rest`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`, `indicator_findings`) VALUES ('If Malaria Blood test was not taken, give reason', 'CHI66', 'fev', 'No test kits;No lab;No skills;Forgot;other (specify)');
INSERT INTO `mnh_rest`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`, `indicator_findings`) VALUES ('Classification DOne', 'CHI67', 'fev', 'Fever/No malaria;Malaria;Very severe febrile disease ');
INSERT INTO `mnh_rest`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`, `indicator_findings`) VALUES ('Ear Infection', 'CHI68', 'con', 'present;not present');
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='present;not present' WHERE `indicator_id`='32';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='present;not present' WHERE `indicator_id`='33';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='Not HIV exposed/infected;HIV exposed  ' WHERE `indicator_id`='34';
INSERT INTO `mnh_rest`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`, `indicator_findings`) VALUES ('If child is HIV Exposed , was a HIV test done', 'CHI35b', 'con', 'HIV Positive;HIV Negative;Results Not ready(PCR test only)');
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='Up-to-date;Not up-to-date ' WHERE `indicator_id`='35';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='Exclusively breastfeeding;Balanced Diet' WHERE `indicator_id`='36';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='On track;Not on track ' WHERE `indicator_id`='37';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='present;not present' WHERE `indicator_id`='10';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='duration' WHERE `indicator_id`='7';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='No dehydration;some dehydration;severe dehydration' WHERE `indicator_id`='18';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='present;not present' WHERE `indicator_id`='8';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='Drinks eagerly;Unable to drink ' WHERE `indicator_id`='11';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='Goes back immediately;Slowly;Very slowly ' WHERE `indicator_id`='12';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='present;not present' WHERE `indicator_id`='55';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='present;not present' WHERE `indicator_id`='56';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='days' WHERE `indicator_id`='57';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='present;not present' WHERE `indicator_id`='58';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='present; not present' WHERE `indicator_id`='59';
UPDATE `mnh_rest`.`indicators` SET `indicator_findings`='No ear Infection;Chronic Ear Infection;Acute Ear Infection;Mastoiditis' WHERE `indicator_id`='60';
