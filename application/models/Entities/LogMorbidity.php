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
}
