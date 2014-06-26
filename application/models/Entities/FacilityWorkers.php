<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * FacilityWorkers
 *
 * @Table(name="facility_workers")
 * @Entity
 */
class FacilityWorkers
{
    /**
     * @var integer
     *
     * @Column(name="fw_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $fwId;

    /**
     * @var string
     *
     * @Column(name="fw_first_name", type="string", length=45, nullable=true)
     */
    private $fwFirstName;

    /**
     * @var string
     *
     * @Column(name="fw_last_name", type="string", length=45, nullable=true)
     */
    private $fwLastName;

    /**
     * @var string
     *
     * @Column(name="fw_national_id", type="string", length=45, nullable=true)
     */
    private $fwNationalId;

    /**
     * @var string
     *
     * @Column(name="fw_personel_id", type="string", length=45, nullable=true)
     */
    private $fwPersonelId;

    /**
     * @var string
     *
     * @Column(name="fw_phone_number", type="string", length=45, nullable=true)
     */
    private $fwPhoneNumber;

    /**
     * @var string
     *
     * @Column(name="fw_year_month_trained", type="string", length=45, nullable=true)
     */
    private $fwYearMonthTrained;

    /**
     * @var string
     *
     * @Column(name="fw_coordinator", type="string", length=45, nullable=true)
     */
    private $fwCoordinator;

    /**
     * @var string
     *
     * @Column(name="fw_designation", type="string", length=45, nullable=true)
     */
    private $fwDesignation;

    /**
     * @var \DateTime
     *
     * @Column(name="fw_updated", type="datetime", nullable=true)
     */
    private $fwUpdated;

    /**
     * @var integer
     *
     * @Column(name="fac_mfl", type="integer", nullable=true)
     */
    private $facMfl;

    /**
     * @var integer
     *
     * @Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get fwId
     *
     * @return integer 
     */
    public function getFwId()
    {
        return $this->fwId;
    }

    /**
     * Set fwFirstName
     *
     * @param string $fwFirstName
     * @return FacilityWorkers
     */
    public function setFwFirstName($fwFirstName)
    {
        $this->fwFirstName = $fwFirstName;
    
        return $this;
    }

    /**
     * Get fwFirstName
     *
     * @return string 
     */
    public function getFwFirstName()
    {
        return $this->fwFirstName;
    }

    /**
     * Set fwLastName
     *
     * @param string $fwLastName
     * @return FacilityWorkers
     */
    public function setFwLastName($fwLastName)
    {
        $this->fwLastName = $fwLastName;
    
        return $this;
    }

    /**
     * Get fwLastName
     *
     * @return string 
     */
    public function getFwLastName()
    {
        return $this->fwLastName;
    }

    /**
     * Set fwNationalId
     *
     * @param string $fwNationalId
     * @return FacilityWorkers
     */
    public function setFwNationalId($fwNationalId)
    {
        $this->fwNationalId = $fwNationalId;
    
        return $this;
    }

    /**
     * Get fwNationalId
     *
     * @return string 
     */
    public function getFwNationalId()
    {
        return $this->fwNationalId;
    }

    /**
     * Set fwPersonelId
     *
     * @param string $fwPersonelId
     * @return FacilityWorkers
     */
    public function setFwPersonelId($fwPersonelId)
    {
        $this->fwPersonelId = $fwPersonelId;
    
        return $this;
    }

    /**
     * Get fwPersonelId
     *
     * @return string 
     */
    public function getFwPersonelId()
    {
        return $this->fwPersonelId;
    }

    /**
     * Set fwPhoneNumber
     *
     * @param string $fwPhoneNumber
     * @return FacilityWorkers
     */
    public function setFwPhoneNumber($fwPhoneNumber)
    {
        $this->fwPhoneNumber = $fwPhoneNumber;
    
        return $this;
    }

    /**
     * Get fwPhoneNumber
     *
     * @return string 
     */
    public function getFwPhoneNumber()
    {
        return $this->fwPhoneNumber;
    }

    /**
     * Set fwYearMonthTrained
     *
     * @param string $fwYearMonthTrained
     * @return FacilityWorkers
     */
    public function setFwYearMonthTrained($fwYearMonthTrained)
    {
        $this->fwYearMonthTrained = $fwYearMonthTrained;
    
        return $this;
    }

    /**
     * Get fwYearMonthTrained
     *
     * @return string 
     */
    public function getFwYearMonthTrained()
    {
        return $this->fwYearMonthTrained;
    }

    /**
     * Set fwCoordinator
     *
     * @param string $fwCoordinator
     * @return FacilityWorkers
     */
    public function setFwCoordinator($fwCoordinator)
    {
        $this->fwCoordinator = $fwCoordinator;
    
        return $this;
    }

    /**
     * Get fwCoordinator
     *
     * @return string 
     */
    public function getFwCoordinator()
    {
        return $this->fwCoordinator;
    }

    /**
     * Set fwDesignation
     *
     * @param string $fwDesignation
     * @return FacilityWorkers
     */
    public function setFwDesignation($fwDesignation)
    {
        $this->fwDesignation = $fwDesignation;
    
        return $this;
    }

    /**
     * Get fwDesignation
     *
     * @return string 
     */
    public function getFwDesignation()
    {
        return $this->fwDesignation;
    }

    /**
     * Set fwUpdated
     *
     * @param \DateTime $fwUpdated
     * @return FacilityWorkers
     */
    public function setFwUpdated($fwUpdated)
    {
        $this->fwUpdated = $fwUpdated;
    
        return $this;
    }

    /**
     * Get fwUpdated
     *
     * @return \DateTime 
     */
    public function getFwUpdated()
    {
        return $this->fwUpdated;
    }

    /**
     * Set facMfl
     *
     * @param integer $facMfl
     * @return FacilityWorkers
     */
    public function setFacMfl($facMfl)
    {
        $this->facMfl = $facMfl;
    
        return $this;
    }

    /**
     * Get facMfl
     *
     * @return integer 
     */
    public function getFacMfl()
    {
        return $this->facMfl;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return FacilityWorkers
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
