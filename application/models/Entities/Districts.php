<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * Districts
 *
 * @Table(name="districts")
 * @Entity
 */
class Districts
{
    /**
     * @var integer
     *
     * @Column(name="district_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $districtId;

    /**
     * @var string
     *
     * @Column(name="district_name", type="string", length=45, nullable=false)
     */
    private $districtName;

    /**
     * @var string
     *
     * @Column(name="district_access_code", type="string", length=255, nullable=false)
     */
    private $districtAccessCode;


    /**
     * Get districtId
     *
     * @return integer 
     */
    public function getDistrictId()
    {
        return $this->districtId;
    }

    /**
     * Set districtName
     *
     * @param string $districtName
     * @return Districts
     */
    public function setDistrictName($districtName)
    {
        $this->districtName = $districtName;
    
        return $this;
    }

    /**
     * Get districtName
     *
     * @return string 
     */
    public function getDistrictName()
    {
        return $this->districtName;
    }

    /**
     * Set districtAccessCode
     *
     * @param string $districtAccessCode
     * @return Districts
     */
    public function setDistrictAccessCode($districtAccessCode)
    {
        $this->districtAccessCode = $districtAccessCode;
    
        return $this;
    }

    /**
     * Get districtAccessCode
     *
     * @return string 
     */
    public function getDistrictAccessCode()
    {
        return $this->districtAccessCode;
    }
}
