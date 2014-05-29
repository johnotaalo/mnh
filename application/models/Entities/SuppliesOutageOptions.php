<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * SuppliesOutageOptions
 *
 * @Table(name="supplies_outage_options")
 * @Entity
 */
class SuppliesOutageOptions
{
    /**
     * @var integer
     *
     * @Column(name="soo_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $sooId;

    /**
     * @var string
     *
     * @Column(name="soo_description", type="string", length=255, nullable=false)
     */
    private $sooDescription;


    /**
     * Get sooId
     *
     * @return integer 
     */
    public function getSooId()
    {
        return $this->sooId;
    }

    /**
     * Set sooDescription
     *
     * @param string $sooDescription
     * @return SuppliesOutageOptions
     */
    public function setSooDescription($sooDescription)
    {
        $this->sooDescription = $sooDescription;
    
        return $this;
    }

    /**
     * Get sooDescription
     *
     * @return string 
     */
    public function getSooDescription()
    {
        return $this->sooDescription;
    }
}
