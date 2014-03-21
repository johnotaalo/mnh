<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * FacilityTypes
 *
 * @Table(name="facility_types")
 * @Entity
 */
class FacilityTypes
{
    /**
     * @var integer
     *
     * @Column(name="ft_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $ftId;

    /**
     * @var string
     *
     * @Column(name="ft_name", type="string", length=55, nullable=false)
     */
    private $ftName;


    /**
     * Get ftId
     *
     * @return integer 
     */
    public function getFtId()
    {
        return $this->ftId;
    }

    /**
     * Set ftName
     *
     * @param string $ftName
     * @return FacilityTypes
     */
    public function setFtName($ftName)
    {
        $this->ftName = $ftName;
    
        return $this;
    }

    /**
     * Get ftName
     *
     * @return string 
     */
    public function getFtName()
    {
        return $this->ftName;
    }
}
