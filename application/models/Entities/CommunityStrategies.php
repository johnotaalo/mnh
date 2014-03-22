<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * CommunityStrategies
 *
 * @Table(name="community_strategies")
 * @Entity
 */
class CommunityStrategies
{
    /**
     * @var integer
     *
     * @Column(name="cs_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $csId;

    /**
     * @var integer
     *
     * @Column(name="cs_response", type="integer", nullable=false)
     */
    private $csResponse;

    /**
     * @var \DateTime
     *
     * @Column(name="cs_created", type="datetime", nullable=false)
     */
    private $csCreated;

    /**
     * @var string
     *
     * @Column(name="strat_id", type="string", length=45, nullable=false)
     */
    private $stratId;

    /**
     * @var string
     *
     * @Column(name="fac_ID", type="string", length=11, nullable=false)
     */
    private $facId;

    /**
     * @var integer
     *
     * @Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get csId
     *
     * @return integer 
     */
    public function getCsId()
    {
        return $this->csId;
    }

    /**
     * Set csResponse
     *
     * @param integer $csResponse
     * @return CommunityStrategies
     */
    public function setCsResponse($csResponse)
    {
        $this->csResponse = $csResponse;
    
        return $this;
    }

    /**
     * Get csResponse
     *
     * @return integer 
     */
    public function getCsResponse()
    {
        return $this->csResponse;
    }

    /**
     * Set csCreated
     *
     * @param \DateTime $csCreated
     * @return CommunityStrategies
     */
    public function setCsCreated($csCreated)
    {
        $this->csCreated = $csCreated;
    
        return $this;
    }

    /**
     * Get csCreated
     *
     * @return \DateTime 
     */
    public function getCsCreated()
    {
        return $this->csCreated;
    }

    /**
     * Set stratId
     *
     * @param string $stratId
     * @return CommunityStrategies
     */
    public function setStratId($stratId)
    {
        $this->stratId = $stratId;
    
        return $this;
    }

    /**
     * Get stratId
     *
     * @return string 
     */
    public function getStratId()
    {
        return $this->stratId;
    }

    /**
     * Set facId
     *
     * @param string $facId
     * @return CommunityStrategies
     */
    public function setFacId($facId)
    {
        $this->facId = $facId;
    
        return $this;
    }

    /**
     * Get facId
     *
     * @return string 
     */
    public function getFacId()
    {
        return $this->facId;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return CommunityStrategies
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
