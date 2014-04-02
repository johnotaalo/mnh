<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * AssessmentTracker
 *
 * @Table(name="assessment_tracker")
 * @Entity
 */
class AssessmentTracker
{
    /**
     * @var integer
     *
     * @Column(name="ast_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $astId;

    /**
     * @var string
     *
     * @Column(name="ast_section", type="string", length=45, nullable=false)
     */
    private $astSection;

    /**
     * @var \DateTime
     *
     * @Column(name="ast_last_activity", type="datetime", nullable=false)
     */
    private $astLastActivity;

    /**
     * @var string
     *
     * @Column(name="ast_survey", type="string", length=4, nullable=false)
     */
    private $astSurvey;

    /**
     * @var string
     *
     * @Column(name="facilityCode", type="string", length=45, nullable=false)
     */
    private $facilitycode;

    /**
     * @var integer
     *
     * @Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get astId
     *
     * @return integer 
     */
    public function getAstId()
    {
        return $this->astId;
    }

    /**
     * Set astSection
     *
     * @param string $astSection
     * @return AssessmentTracker
     */
    public function setAstSection($astSection)
    {
        $this->astSection = $astSection;
    
        return $this;
    }

    /**
     * Get astSection
     *
     * @return string 
     */
    public function getAstSection()
    {
        return $this->astSection;
    }

    /**
     * Set astLastActivity
     *
     * @param \DateTime $astLastActivity
     * @return AssessmentTracker
     */
    public function setAstLastActivity($astLastActivity)
    {
        $this->astLastActivity = $astLastActivity;
    
        return $this;
    }

    /**
     * Get astLastActivity
     *
     * @return \DateTime 
     */
    public function getAstLastActivity()
    {
        return $this->astLastActivity;
    }

    /**
     * Set astSurvey
     *
     * @param string $astSurvey
     * @return AssessmentTracker
     */
    public function setAstSurvey($astSurvey)
    {
        $this->astSurvey = $astSurvey;
    
        return $this;
    }

    /**
     * Get astSurvey
     *
     * @return string 
     */
    public function getAstSurvey()
    {
        return $this->astSurvey;
    }

    /**
     * Set facilitycode
     *
     * @param string $facilitycode
     * @return AssessmentTracker
     */
    public function setFacilitycode($facilitycode)
    {
        $this->facilitycode = $facilitycode;
    
        return $this;
    }

    /**
     * Get facilitycode
     *
     * @return string 
     */
    public function getFacilitycode()
    {
        return $this->facilitycode;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return TrainingGuidelines
     */
    public function setSsId($ssId)
    {
        $this->ssId = $ssId;
    
        return $this;
    }

    /**
     * Get ssId
     *
     * @return integer 
     */
    public function getSsId()
    {
        return $this->ssId;
    }
}
