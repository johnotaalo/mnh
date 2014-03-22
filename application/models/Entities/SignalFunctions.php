<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * SignalFunctions
 *
 * @Table(name="signal_functions")
 * @Entity
 */
class SignalFunctions
{
    /**
     * @var integer
     *
     * @Column(name="sf_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $sfId;

    /**
     * @var string
     *
     * @Column(name="sf_code", type="string", length=15, nullable=false)
     */
    private $sfCode;

    /**
     * @var string
     *
     * @Column(name="sf_name", type="string", length=45, nullable=true)
     */
    private $sfName;


    /**
     * Get sfId
     *
     * @return integer 
     */
    public function getSfId()
    {
        return $this->sfId;
    }

    /**
     * Set sfCode
     *
     * @param string $sfCode
     * @return SignalFunctions
     */
    public function setSfCode($sfCode)
    {
        $this->sfCode = $sfCode;
    
        return $this;
    }

    /**
     * Get sfCode
     *
     * @return string 
     */
    public function getSfCode()
    {
        return $this->sfCode;
    }

    /**
     * Set sfName
     *
     * @param string $sfName
     * @return SignalFunctions
     */
    public function setSfName($sfName)
    {
        $this->sfName = $sfName;
    
        return $this;
    }

    /**
     * Get sfName
     *
     * @return string 
     */
    public function getSfName()
    {
        return $this->sfName;
    }
}
