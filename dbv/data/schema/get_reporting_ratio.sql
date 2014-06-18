CREATE DEFINER=`root`@`localhost` PROCEDURE `get_reporting_ratio`(IN survey_type VARCHAR(45),IN survey_category VARCHAR(45), IN county VARCHAR(45),IN section VARCHAR(45))
    DETERMINISTIC
    COMMENT 'Gets County Reporting Ratio'
BEGIN
SELECT 
    tracker.reported,
    facilityData.actual,
    round((tracker.reported / facilityData.actual) * 100,0) as percentage
FROM
(SELECT 
    COUNT(*) as reported
FROM
    facilities f
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
 JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section = section AND ast.ast_survey=survey_type
JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    f.fac_county = county) as tracker,
(SELECT 
        COUNT(fac_mfl) as actual
    FROM
        facilities
    WHERE
        facilities.fac_county = county
		AND fac_type != "Dental Clinic"
            AND fac_type != "VCT Centre (Stand-Alone)"
            AND fac_type != "Training Institution in Health (Stand-alone)"
            AND fac_type != "Funeral Home (Stand-alone)"
            AND fac_type != "Laboratory (Stand-alone)"
            AND fac_type != "Health Project"
            AND fac_type != "Eye Clinic"
			AND fac_type != "Eye Centre"
            AND fac_type != "Radiology Unit") as facilityData;
END