<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * Supplies
 *
 * @Table(name="supplies")
 * @Entity
 */
class Supplies
{
    /**
     * @var integer
     *
     * @Column(name="supply_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $supplyId;

    /**
     * @var string
     *
     * @Column(name="supply_code", type="string", length=15, nullable=false)
     */
    private $supplyCode;

    /**
     * @var string
     *
     * @Column(name="supply_name", type="string", length=150, nullable=false)
     */
    private $supplyName;

    /**
     * @var string
     *
     * @Column(name="supply_unit", type="string", length=100, nullable=false)
     */
    private $supplyUnit;

    /**
     * @var string
     *
     * @Column(name="supply_for", type="string", length=3, nullable=false)
     */
    private $supplyFor;


    /**
     * Get supplyId
     *
     * @return integer 
     */
    public function getSupplyId()
    {
        return $this->supplyId;
    }

    /**
     * Set supplyCode
     *
     * @param string $supplyCode
     * @return Supplies
     */
    public function setSupplyCode($supplyCode)
    {
        $this->supplyCode = $supplyCode;
    
        return $this;
    }

    /**
     * Get supplyCode
     *
     * @return string 
     */
    public function getSupplyCode()
    {
        return $this->supplyCode;
    }

    /**
     * Set supplyName
     *
     * @param string $supplyName
     * @return Supplies
     */
    public function setSupplyName($supplyName)
    {
        $this->supplyName = $supplyName;
    
        return $this;
    }

    /**
     * Get supplyName
     *
     * @return string 
     */
    public function getSupplyName()
    {
        return $this->supplyName;
    }

    /**
     * Set supplyUnit
     *
     * @param string $supplyUnit
     * @return Supplies
     */
    public function setSupplyUnit($supplyUnit)
    {
        $this->supplyUnit = $supplyUnit;
    
        return $this;
    }

    /**
     * Get supplyUnit
     *
     * @return string 
     */
    public function getSupplyUnit()
    {
        return $this->supplyUnit;
    }

    /**
     * Set supplyFor
     *
     * @param string $supplyFor
     * @return Supplies
     */
    public function setSupplyFor($supplyFor)
    {
        $this->supplyFor = $supplyFor;
    
        return $this;
    }

    /**
     * Get supplyFor
     *
     * @return string 
     */
    public function getSupplyFor()
    {
        return $this->supplyFor;
    }
}
