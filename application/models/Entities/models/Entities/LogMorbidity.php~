<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * LogMorbidity
 *
 * @Table(name="log_morbidity")
 * @Entity
 */
class LogMorbidity
{
    /**
     * @var integer
     *
     * @Column(name="lm_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $lmId;

    /**
     * @var \DateTime
     *
     * @Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;
 /**
     * @var string
     *
     * @Column(name="month", type="string", length=45, nullable=true)
     */
    private $month;

    /**
     * @var string
     *
     * @Column(name="year", type="string", length=45, nullable=true)
     */
    private $year;
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
     * Get lmId
     *
     * @return integer 
     */
    public function getLmId()
    {
        return $this->lmId;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return LogMorbidity
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;
    
        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime 
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }
/**
     * Set month
     *
     * @param string $month
     * @return LogMorbidity
     */
    public function setMonth($month)
    {
        $this->month = $month;
    
        return $this;
    }

    /**
     * Get month
     *
     * @return string 
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set year
     *
     * @param string $year
     * @return LogMorbidity
     */
    public function setYear($year)
    {
        $this->year = $year;
    
        return $this;
    }

    /**
     * Get year
     *
     * @return string 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return LogMorbidity
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
     * @return LogMorbidity
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
    /**
     * @var integer
     *
     * @ORM\Column(name="lm_number", type="integer", nullable=true)
     */
    private $lmNumber;


    /**
     * Set lmNumber
     *
     * @param integer $lmNumber
     * @return LogMorbidity
     */
    public function setLmNumber($lmNumber)
    {
        $this->lmNumber = $lmNumber;
    
        return $this;
    }

    /**
     * Get lmNumber
     *
     * @return integer 
     */
    public function getLmNumber()
    {
        return $this->lmNumber;
    }
}