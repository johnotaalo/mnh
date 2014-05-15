ALTER TABLE `mnh`.`indicators` 
DROP INDEX `indicatorName` ;
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Asked how long the child had the cough', 'CHI25', 'pne');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Breath counts taken', 'CHI26', 'pne');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Looked for chest indrawing', 'CHI27', 'pne');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Looked and listened for stridor', 'CHI28', 'pne');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Looked and listened for a wheeze', 'CHI29', 'pne');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Asked about the duration', 'CHI30', 'fev');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Temperature taken', 'CHI31', 'fev');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Looked for signs of measles', 'CHI32', 'fev');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Malnutrition', 'CHI33', 'con');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Anaemia', 'CHI34', 'con');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('HIV exposure/infection', 'CHI35', 'con');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Immunization states', 'CHI36', 'con');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Child\'s Feeding', 'CHI37', 'con');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Cone for development', 'CHI38', 'con');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('ORT given approximately according to plan', 'CHI39', 'cnl');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Zinc given appropriately to a child with diarrhoea', 'CHI40', 'cnl');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Antibiotics prescribed correctly', 'CHI41', 'cnl');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('No antibiotics needed; none given', 'CHI42', 'cnl');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Anti-malaria prescribed correctly', 'CHI43', 'cnl');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Needed Vitamin A supplementation given', 'CHI44', 'cnl');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Needed deworming medication givern', 'CHI45', 'cnl');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Appropriate counseling in feeding problems and homecare given', 'CHI46', 'cnl');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Appropriate follow up arranged', 'CHI47', 'cnl');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Necessary referral made including referral note and pre-treatment', 'CHI48', 'ref');
INSERT INTO `mnh`.`indicators` (`indicator_name`, `indicator_code`, `indicator_for`) VALUES ('Correct Classification', 'CHI49', 'cls');