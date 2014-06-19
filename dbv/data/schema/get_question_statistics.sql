CREATE DEFINER=`root`@`localhost` PROCEDURE `get_question_statistics`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), questionfor VARCHAR(45))
BEGIN

CASE criteria
WHEN 'national' THEN
SELECT 
     question_code,
    sum(if(lq_response = 'Yes', 1, 0)) as yes_values,
    sum(if(lq_response = 'No', 1, 0)) as no_values
FROM
    log_questions lq
WHERE
    lq.question_code IN (SELECT 
            question_code
        FROM
            questions
        WHERE
            question_for = questionfor)
        AND lq.fac_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) )
GROUP BY lq.question_code
ORDER BY lq.question_code ASC;

WHEN 'facility' THEN
SELECT 
     question_code,
    sum(if(lq_response = 'Yes', 1, 0)) as yes_values,
    sum(if(lq_response = 'No', 1, 0)) as no_values
FROM
    log_questions lq
WHERE
    lq.question_code IN (SELECT 
            question_code
        FROM
            questions
        WHERE
            question_for = questionfor)
        AND lq.fac_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) WHERE fac_mfl = analytic_value)
GROUP BY lq.question_code
ORDER BY lq.question_code ASC;

WHEN 'district' THEN
SELECT 
     question_code,
    sum(if(lq_response = 'Yes', 1, 0)) as yes_values,
    sum(if(lq_response = 'No', 1, 0)) as no_values
FROM
    log_questions lq
WHERE
    lq.question_code IN (SELECT 
            question_code
        FROM
            questions
        WHERE
            question_for = questionfor)
        AND lq.fac_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) WHERE fac_district = analytic_value)
GROUP BY lq.question_code
ORDER BY lq.question_code ASC;

WHEN 'county' THEN
SELECT 
     question_code,
    sum(if(lq_response = 'Yes', 1, 0)) as yes_values,
    sum(if(lq_response = 'No', 1, 0)) as no_values
FROM
    log_questions lq
WHERE
    lq.question_code IN (SELECT 
            question_code
        FROM
            questions
        WHERE
            question_for = questionfor)
        AND lq.fac_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) WHERE fac_county = analytic_value)
GROUP BY lq.question_code
ORDER BY lq.question_code ASC;

END CASE;



END