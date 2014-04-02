<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * AccessChallenges
 *
 * @Table(name="access_challenges")
 * @Entity
 */
class AccessChallenges
{
    /**
     * @var integer
     *
     * @Column(name="ach_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $achId;

    /**
     * @var string
     *
     * @Column(name="ach_code", type="string", length=45, nullable=true)
     */
    private $achCode;

    /**
     * @var string
     *
     * @Column(name="ach_name", type="string", length=45, nullable=true)
     */
    private $achName;


    /**
     * Get achId
     *
     * @return integer 
     */
    public function getAchId()
    {
        return $this->achId;
    }

    /**
     * Set achCode
     *
     * @param string $achCode
     * @return AccessChallenges
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
     * Set achName
     *
     * @param string $achName
     * @return AccessChallenges
     */
    public function setAchName($achName)
    {
        $this->achName = $achName;
    
        return $this;
    }

    /**
     * Get achName
     *
     * @return string 
     */
    public function getAchName()
    {
        return $this->achName;
    }
}
