<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * CommodityOutageOptions
 *
 * @Table(name="commodity_outage_options")
 * @Entity
 */
class CommodityOutageOptions
{
    /**
     * @var integer
     *
     * @Column(name="coo_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $cooId;

    /**
     * @var string
     *
     * @Column(name="coo_description", type="string", length=255, nullable=false)
     */
    private $cooDescription;


    /**
     * Get cooId
     *
     * @return integer 
     */
    public function getCooId()
    {
        return $this->cooId;
    }

    /**
     * Set cooDescription
     *
     * @param string $cooDescription
     * @return CommodityOutageOptions
     */
    public function setCooDescription($cooDescription)
    {
        $this->cooDescription = $cooDescription;
    
        return $this;
    }

    /**
     * Get cooDescription
     *
     * @return string 
     */
    public function getCooDescription()
    {
        return $this->cooDescription;
    }
}
