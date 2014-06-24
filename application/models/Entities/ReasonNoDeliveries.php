<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * ReasonNoDeliveries
 *
 * @Table(name="reason_no_deliveries")
 * @Entity
 */
class ReasonNoDeliveries
{
    /**
     * @var integer
     *
     * @Column(name="rnd_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $rndId;

    /**
     * @var string
     *
     * @Column(name="rsn_name", type="string", length=255, nullable=false)
     */
    private $rsnName;


    /**
     * Get rndId
     *
     * @return integer 
     */
    public function getRndId()
    {
        return $this->rndId;
    }

    /**
     * Set rsnName
     *
     * @param string $rsnName
     * @return ReasonNoDeliveries
     */
    public function setRsnName($rsnName)
    {
        $this->rsnName = $rsnName;
    
        return $this;
    }

    /**
     * Get rsnName
     *
     * @return string 
     */
    public function getRsnName()
    {
        return $this->rsnName;
    }
}
