<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * FacilityLevels
 *
 * @Table(name="facility_levels")
 * @Entity
 */
class FacilityLevels
{
    /**
     * @var integer
     *
     * @Column(name="fl_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $flId;

    /**
     * @var string
     *
     * @Column(name="fl_name", type="string", length=45, nullable=false)
     */
    private $flName;


    /**
     * Get flId
     *
     * @return integer 
     */
    public function getFlId()
    {
        return $this->flId;
    }

    /**
     * Set flName
     *
     * @param string $flName
     * @return FacilityLevels
     */
    public function setFlName($flName)
    {
        $this->flName = $flName;
    
        return $this;
    }

    /**
     * Get flName
     *
     * @return string 
     */
    public function getFlName()
    {
        return $this->flName;
    }
}
