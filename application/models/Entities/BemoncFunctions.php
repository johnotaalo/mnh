<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * BemoncFunctions
 *
 * @Table(name="bemonc_functions")
 * @Entity
 */
class BemoncFunctions
{
    /**
     * @var integer
     *
     * @Column(name="bem_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $bemId;

    /**
     * @var string
     *
     * @Column(name="bem_conducted", type="string", length=45, nullable=true)
     */
    private $bemConducted;

    /**
     * @var \DateTime
     *
     * @Column(name="bem_created", type="datetime", nullable=false)
     */
    private $bemCreated;

    /**
     * @var string
     *
     * @Column(name="challenge_code", type="string", length=45, nullable=false)
     */
    private $challengeCode;

    /**
     * @var string
     *
     * @Column(name="sf_code", type="string", length=11, nullable=false)
     */
    private $sfCode;

    /**
     * @var string
     *
     * @Column(name="fac_id", type="string", length=11, nullable=false)
     */
    private $facId;

    /**
     * @var integer
     *
     * @Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get bemId
     *
     * @return integer 
     */
    public function getBemId()
    {
        return $this->bemId;
    }

    /**
     * Set bemConducted
     *
     * @param string $bemConducted
     * @return BemoncFunctions
     */
    public function setBemConducted($bemConducted)
    {
        $this->bemConducted = $bemConducted;
    
        return $this;
    }

    /**
     * Get bemConducted
     *
     * @return string 
     */
    public function getBemConducted()
    {
        return $this->bemConducted;
    }

    /**
     * Set bemCreated
     *
     * @param \DateTime $bemCreated
     * @return BemoncFunctions
     */
    public function setBemCreated($bemCreated)
    {
        $this->bemCreated = $bemCreated;
    
        return $this;
    }

    /**
     * Get bemCreated
     *
     * @return \DateTime 
     */
    public function getBemCreated()
    {
        return $this->bemCreated;
    }

    /**
     * Set challengeCode
     *
     * @param string $challengeCode
     * @return BemoncFunctions
     */
    public function setChallengeCode($challengeCode)
    {
        $this->challengeCode = $challengeCode;
    
        return $this;
    }

    /**
     * Get challengeCode
     *
     * @return string 
     */
    public function getChallengeCode()
    {
        return $this->challengeCode;
    }

    /**
     * Set sfCode
     *
     * @param string $sfCode
     * @return BemoncFunctions
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
     * Set facId
     *
     * @param string $facId
     * @return BemoncFunctions
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
     * @return BemoncFunctions
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
