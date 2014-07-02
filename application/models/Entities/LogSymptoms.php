<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * LogSymptoms
 *
 * @Table(name="log_symptoms")
 * @Entity
 */
class LogSymptoms
{
    /**
     * @var integer
     *
     * @Column(name="ls_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $lsId;

    /**
     * @var integer
     *
     * @Column(name="ls_shortname", type="integer", nullable=true)
     */
    private $lsShortname;

    /**
     * @var string
     *
     * @Column(name="ls_treatments", type="string", length=255, nullable=true)
     */
    private $lsTreatments;

    /**
     * @var \DateTime
     *
     * @Column(name="lt_created", type="datetime", nullable=true)
     */
    private $ltCreated;

    /**
     * @var string
     *
     * @Column(name="facility_mfl", type="string", length=11, nullable=true)
     */
    private $facilityMfl;

    /**
     * @var integer
     *
     * @Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get lsId
     *
     * @return integer 
     */
    public function getLsId()
    {
        return $this->lsId;
    }

    /**
     * Set lsShortname
     *
     * @param integer $lsShortname
     * @return LogSymptoms
     */
    public function setLsShortname($lsShortname)
    {
        $this->lsShortname = $lsShortname;
    
        return $this;
    }

    /**
     * Get lsShortname
     *
     * @return integer 
     */
    public function getLsShortname()
    {
        return $this->lsShortname;
    }

    /**
     * Set lsTreatments
     *
     * @param string $lsTreatments
     * @return LogSymptoms
     */
    public function setLsTreatments($lsTreatments)
    {
        $this->lsTreatments = $lsTreatments;
    
        return $this;
    }

    /**
     * Get lsTreatments
     *
     * @return string 
     */
    public function getLsTreatments()
    {
        return $this->lsTreatments;
    }

    /**
     * Set ltCreated
     *
     * @param \DateTime $ltCreated
     * @return LogSymptoms
     */
    public function setLtCreated($ltCreated)
    {
        $this->ltCreated = $ltCreated;
    
        return $this;
    }

    /**
     * Get ltCreated
     *
     * @return \DateTime 
     */
    public function getLtCreated()
    {
        return $this->ltCreated;
    }

    /**
     * Set facilityMfl
     *
     * @param string $facilityMfl
     * @return LogSymptoms
     */
    public function setFacilityMfl($facilityMfl)
    {
        $this->facilityMfl = $facilityMfl;
    
        return $this;
    }

    /**
     * Get facilityMfl
     *
     * @return string 
     */
    public function getFacilityMfl()
    {
        return $this->facilityMfl;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return LogSymptoms
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
