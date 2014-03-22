<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * Deliveries
 *
 * @Table(name="deliveries")
 * @Entity
 */
class Deliveries
{
    /**
     * @var integer
     *
     * @Column(name="del_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $delId;

    /**
     * @var integer
     *
     * @Column(name="del_value", type="integer", nullable=true)
     */
    private $delValue;

    /**
     * @var integer
     *
     * @Column(name="del_month_year", type="integer", nullable=true)
     */
    private $delMonthYear;

    /**
     * @var \DateTime
     *
     * @Column(name="del_created", type="datetime", nullable=false)
     */
    private $delCreated;

    /**
     * @var string
     *
     * @Column(name="fac_mfl", type="string", length=11, nullable=false)
     */
    private $facMfl;

    /**
     * @var integer
     *
     * @Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get delId
     *
     * @return integer 
     */
    public function getDelId()
    {
        return $this->delId;
    }

    /**
     * Set delValue
     *
     * @param integer $delValue
     * @return Deliveries
     */
    public function setDelValue($delValue)
    {
        $this->delValue = $delValue;
    
        return $this;
    }

    /**
     * Get delValue
     *
     * @return integer 
     */
    public function getDelValue()
    {
        return $this->delValue;
    }

    /**
     * Set delMonthYear
     *
     * @param integer $delMonthYear
     * @return Deliveries
     */
    public function setDelMonthYear($delMonthYear)
    {
        $this->delMonthYear = $delMonthYear;
    
        return $this;
    }

    /**
     * Get delMonthYear
     *
     * @return integer 
     */
    public function getDelMonthYear()
    {
        return $this->delMonthYear;
    }

    /**
     * Set delCreated
     *
     * @param \DateTime $delCreated
     * @return Deliveries
     */
    public function setDelCreated($delCreated)
    {
        $this->delCreated = $delCreated;
    
        return $this;
    }

    /**
     * Get delCreated
     *
     * @return \DateTime 
     */
    public function getDelCreated()
    {
        return $this->delCreated;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return Deliveries
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
     * @param integer $ssId
     * @return Deliveries
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
