
ALTER TABLE `mnh_rest`.`hcw_conclusion` 
ADD COLUMN `fac_mfl` INT(11) NULL AFTER `hc_date_supervisee`,
ADD COLUMN `ss_id` INT(11) NULL AFTER `fac_mfl`;