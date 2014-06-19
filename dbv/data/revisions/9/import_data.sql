/**
 * Truncate TABLE
 */

TRUNCATE mnh_test.assessment_tracker;
/**
 * Insert into TABLE
 */

INSERT INTO mnh_test.assessment_tracker 
SELECT * FROM mnh_live.assessment_tracker;

/**
 * Truncate TABLE
 */

TRUNCATE mnh_test.available_commodities;
/**
 * Insert into TABLE
 */

INSERT INTO mnh_test.available_commodities 
SELECT * FROM mnh_live.available_commodities;


/**
 * Truncate TABLE
 */

TRUNCATE mnh_test.available_equipments;
/**
 * Insert into TABLE
 */

INSERT INTO mnh_test.available_equipments 
SELECT * FROM mnh_live.available_equipments;

/**
 * Truncate TABLE
 */

TRUNCATE mnh_test.available_resources;
/**
 * Insert into TABLE
 */

INSERT INTO mnh_test.available_resources 
SELECT * FROM mnh_live.available_resources;

/**
 * Truncate TABLE
 */

TRUNCATE mnh_test.available_supplies;
/**
 * Insert into TABLE
 */

INSERT INTO mnh_test.available_supplies 
SELECT * FROM mnh_live.available_supplies;

/**
 * Truncate TABLE
 */

TRUNCATE mnh_test.log_challenges;
/**
 * Insert into TABLE
 */

INSERT INTO mnh_test.log_challenges 
SELECT * FROM mnh_live.log_challenges;


/**
 * Truncate TABLE
 */

TRUNCATE mnh_test.log_challenges;
/**
 * Insert into TABLE
 */

INSERT INTO mnh_test.log_challenges 
SELECT * FROM mnh_live.log_challenges;
/**
 * Truncate TABLE
 */
 TRUNCATE mnh_test.log_commodity_stock_outs;
/**
 * Insert into TABLE
 */
INSERT INTO mnh_test.log_commodity_stock_outs 
SELECT * FROM mnh_live.log_commodity_stock_outs;

/**
 * Truncate TABLE
 */
 TRUNCATE mnh_test.log_indicators;
/**
 * Insert into TABLE
 */
INSERT INTO mnh_test.log_indicators (li_id,li_response,li_created,indicator_code,fac_mfl,ss_id) 
SELECT li_id,li_response,li_created,indicator_code,fac_mfl,ss_id FROM mnh_live.log_indicators;
/**
 * Truncate TABLE
 */
 TRUNCATE mnh_test.log_questions;
/**
 * Insert into TABLE
 */
INSERT INTO mnh_test.log_questions 
SELECT * FROM mnh_live.log_questions;

/**
 * Truncate TABLE
 */
 TRUNCATE mnh_test.log_morbidity;
/**
 * Insert into TABLE
 */
INSERT INTO mnh_test.log_morbidity 
SELECT * FROM mnh_live.log_morbidity;
/**
 * Truncate TABLE
 */
 TRUNCATE mnh_test.log_sessions;
/**
 * Insert into TABLE
 */
INSERT INTO mnh_test.log_sessions 
SELECT * FROM mnh_live.log_sessions;
/**
 * Truncate TABLE
 */
 TRUNCATE mnh_test.log_supply_stock_outs;
/**
 * Insert into TABLE
 */
INSERT INTO mnh_test.log_supply_stock_outs 
SELECT * FROM mnh_live.log_supply_stock_outs;
/**
 * Truncate TABLE
 */
 TRUNCATE mnh_test.log_treatment;
/**
 * Insert into TABLE
 */
INSERT INTO mnh_test.log_treatment 
SELECT * FROM mnh_live.log_treatment;
