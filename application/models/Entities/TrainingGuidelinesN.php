<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * TrainingGuidelinesN
 *
 * @Table(name="training_guidelines_n")
 * @Entity
 */
class TrainingGuidelinesN
{
    /**
     * @var integer
     *
     * @Column(name="tg_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $tgId;

    /**
     * @var string
     *
     * @Column(name="tg_staff", type="string", length=45, nullable=true)
     */
    private $tgStaff;

    /**
     * @var integer
     *
     * @Column(name="tg_total_facility", type="integer", nullable=true)
     */
    private $tgTotalFacility;

    /**
     * @var integer
     *
     * @Column(name="tg_total_duty", type="integer", nullable=true)
     */
    private $tgTotalDuty;

    /**
     * @var integer
     *
     * @Column(name="tg_working", type="integer", nullable=true)
     */
    private $tgWorking;

    /**
     * @var integer
     *
     * @Column(name="tg_before", type="integer", nullable=true)
     */
    private $tgBefore;

    /**
     * @var integer
     *
     * @Column(name="tg_after", type="integer", nullable=true)
     */
    private $tgAfter;

    /**
     * @var string
     *
     * @Column(name="guide_code", type="string", length=45, nullable=true)
     */
    private $guideCode;

    /**
     * @var string
     *
     * @Column(name="fac_mfl", type="string", length=45, nullable=true)
     */
    private $facMfl;

    /**
     * @var string
     *
     * @Column(name="ss_id", type="string", length=45, nullable=true)
     */
    private $ssId;


    /**
     * Get tgId
     *
     * @return integer 
     */
    public function getTgId()
    {
        return $this->tgId;
    }

    /**
     * Set tgStaff
     *
     * @param string $tgStaff
     * @return TrainingGuidelinesN
     */
    public function setTgStaff($tgStaff)
    {
        $this->tgStaff = $tgStaff;
    
        return $this;
    }

    /**
     * Get tgStaff
     *
     * @return string 
     */
    public function getTgStaff()
    {
        return $this->tgStaff;
    }

    /**
     * Set tgTotalFacility
     *
     * @param integer $tgTotalFacility
     * @return TrainingGuidelinesN
     */
    public function setTgTotalFacility($tgTotalFacility)
    {
        $this->tgTotalFacility = $tgTotalFacility;
    
        return $this;
    }

    /**
     * Get tgTotalFacility
     *
     * @return integer 
     */
    public function getTgTotalFacility()
    {
        return $this->tgTotalFacility;
    }

    /**
     * Set tgTotalDuty
     *
     * @param integer $tgTotalDuty
     * @return TrainingGuidelinesN
     */
    public function setTgTotalDuty($tgTotalDuty)
    {
        $this->tgTotalDuty = $tgTotalDuty;
    
        return $this;
    }

    /**
     * Get tgTotalDuty
     *
     * @return integer 
     */
    public function getTgTotalDuty()
    {
        return $this->tgTotalDuty;
    }

    /**
     * Set tgWorking
     *
     * @param integer $tgWorking
     * @return TrainingGuidelinesN
     */
    public function setTgWorking($tgWorking)
    {
        $this->tgWorking = $tgWorking;
    
        return $this;
    }

    /**
     * Get tgWorking
     *
     * @return integer 
     */
    public function getTgWorking()
    {
        return $this->tgWorking;
    }

    /**
     * Set tgBefore
     *
     * @param integer $tgBefore
     * @return TrainingGuidelinesN
     */
    public function setTgBefore($tgBefore)
    {
        $this->tgBefore = $tgBefore;
    
        return $this;
    }

    /**
     * Get tgBefore
     *
     * @return integer 
     */
    public function getTgBefore()
    {
        return $this->tgBefore;
    }

    /**
     * Set tgAfter
     *
     * @param integer $tgAfter
     * @return TrainingGuidelinesN
     */
    public function setTgAfter($tgAfter)
    {
        $this->tgAfter = $tgAfter;
    
        return $this;
    }

    /**
     * Get tgAfter
     *
     * @return integer 
     */
    public function getTgAfter()
    {
        return $this->tgAfter;
    }

    /**
     * Set guideCode
     *
     * @param string $guideCode
     * @return TrainingGuidelinesN
     */
    public function setGuideCode($guideCode)
    {
        $this->guideCode = $guideCode;
    
        return $this;
    }

    /**
     * Get guideCode
     *
     * @return string 
     */
    public function getGuideCode()
    {
        return $this->guideCode;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return TrainingGuidelinesN
     */
    public function setFacMfl($facMfl)
    {
        $this->facMfl = $facMfl;
    
        return $this;
    }

    /**
     * Get facMfl
     *
     * @return string 
     */
    public function getFacMfl()
    {
        return $this->facMfl;
    }

    /**
     * Set ssId
     *
     * @param string $ssId
     * @return TrainingGuidelinesN
     */
    public function setSsId($ssId)
    {
        $this->ssId = $ssId;
    
        return $this;
    }

    /**
     * Get ssId
     *
     * @return string 
     */
    public function getSsId()
    {
        return $this->ssId;
    }
}