<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * OrtCornerAspects
 *
 * @Table(name="ort_corner_aspects")
 * @Entity
 */
class OrtCornerAspects
{
    /**
     * @var integer
     *
     * @Column(name="oca_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $ocaId;

    /**
     * @var string
     *
     * @Column(name="oca_response", type="string", length=255, nullable=true)
     */
    private $ocaResponse;

    /**
     * @var \DateTime
     *
     * @Column(name="oca_created", type="datetime", nullable=false)
     */
    private $ocaCreated;

    /**
     * @var string
     *
     * @Column(name="question_code", type="string", length=10, nullable=false)
     */
    private $questionCode;

    /**
     * @var string
     *
     * @Column(name="fac_mfl", type="string", length=11, nullable=false)
     */
    private $facMfl;

    /**
     * @var integer
     *
     * @Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get ocaId
     *
     * @return integer 
     */
    public function getOcaId()
    {
        return $this->ocaId;
    }

    /**
     * Set ocaResponse
     *
     * @param string $ocaResponse
     * @return OrtCornerAspects
     */
    public function setOcaResponse($ocaResponse)
    {
        $this->ocaResponse = $ocaResponse;
    
        return $this;
    }

    /**
     * Get ocaResponse
     *
     * @return string 
     */
    public function getOcaResponse()
    {
        return $this->ocaResponse;
    }

    /**
     * Set ocaCreated
     *
     * @param \DateTime $ocaCreated
     * @return OrtCornerAspects
     */
    public function setOcaCreated($ocaCreated)
    {
        $this->ocaCreated = $ocaCreated;
    
        return $this;
    }

    /**
     * Get ocaCreated
     *
     * @return \DateTime 
     */
    public function getOcaCreated()
    {
        return $this->ocaCreated;
    }

    /**
     * Set questionCode
     *
     * @param string $questionCode
     * @return OrtCornerAspects
     */
    public function setQuestionCode($questionCode)
    {
        $this->questionCode = $questionCode;
    
        return $this;
    }

    /**
     * Get questionCode
     *
     * @return string 
     */
    public function getQuestionCode()
    {
        return $this->questionCode;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return OrtCornerAspects
     */
    public function setFacMfl($facMfl)
    {
        $this->facMfl = $facMfl;
    
        return $this;
    }

    /**
     * Get facMfl
     *
     * @return string 
     */
    public function getFacMfl()
    {
        return $this->facMfl;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return OrtCornerAspects
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
