<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * LogIndicators
 *
 * @Table(name="log_indicators")
 * @Entity
 */
class LogIndicators
{
    /**
     * @var integer
     *
     * @Column(name="li_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $liId;

    /**
     * @var string
     *
     * @Column(name="li_response", type="string", length=6, nullable=true)
     */
    private $liResponse;

    /**
     * @var \DateTime
     *
     * @Column(name="li_created", type="datetime", nullable=false)
     */
    private $liCreated;

    /**
     * @var string
     *
     * @Column(name="indicator_code", type="string", length=8, nullable=false)
     */
    private $indicatorCode;

    /**
     * @var string
     *
     * @Column(name="fac_id", type="string", length=11, nullable=false)
     */
    private $facId;

    /**
     * @var integer
     *
     * @Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get liId
     *
     * @return integer 
     */
    public function getLiId()
    {
        return $this->liId;
    }

    /**
     * Set liResponse
     *
     * @param string $liResponse
     * @return LogIndicators
     */
    public function setLiResponse($liResponse)
    {
        $this->liResponse = $liResponse;
    
        return $this;
    }

    /**
     * Get liResponse
     *
     * @return string 
     */
    public function getLiResponse()
    {
        return $this->liResponse;
    }

    /**
     * Set liCreated
     *
     * @param \DateTime $liCreated
     * @return LogIndicators
     */
    public function setLiCreated($liCreated)
    {
        $this->liCreated = $liCreated;
    
        return $this;
    }

    /**
     * Get liCreated
     *
     * @return \DateTime 
     */
    public function getLiCreated()
    {
        return $this->liCreated;
    }

    /**
     * Set indicatorCode
     *
     * @param string $indicatorCode
     * @return LogIndicators
     */
    public function setIndicatorCode($indicatorCode)
    {
        $this->indicatorCode = $indicatorCode;
    
        return $this;
    }

    /**
     * Get indicatorCode
     *
     * @return string 
     */
    public function getIndicatorCode()
    {
        return $this->indicatorCode;
    }

    /**
     * Set facId
     *
     * @param string $facId
     * @return LogIndicators
     */
    public function setFacId($facId)
    {
        $this->facId = $facId;
    
        return $this;
    }

    /**
     * Get facId
     *
     * @return string 
     */
    public function getFacId()
    {
        return $this->facId;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return LogIndicators
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
