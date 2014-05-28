<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * LogChallenges
 *
 * @Table(name="log_challenges")
 * @Entity
 */
class LogChallenges
{
    /**
     * @var integer
     *
     * @Column(name="lc_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $lcId;

    /**
     * @var string
     *
     * @Column(name="ach_code", type="string", length=45, nullable=true)
     */
    private $achCode;

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
     * Get lcId
     *
     * @return integer 
     */
    public function getLcId()
    {
        return $this->lcId;
    }

    /**
     * Set achCode
     *
     * @param string $achCode
     * @return LogChallenges
     */
    public function setAchCode($achCode)
    {
        $this->achCode = $achCode;
    
        return $this;
    }

    /**
     * Get achCode
     *
     * @return string 
     */
    public function getAchCode()
    {
        return $this->achCode;
    }

    /**
     * Set facMfl
     *
     * @param integer $facMfl
     * @return LogChallenges
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
     * @return LogChallenges
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
