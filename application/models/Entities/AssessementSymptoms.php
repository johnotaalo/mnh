<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * AssessementSymptoms
 *
 * @Table(name="assessement_symptoms")
 * @Entity
 */
class AssessementSymptoms
{
    /**
     * @var integer
     *
     * @Column(name="lq_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $lqId;

    /**
     * @var string
     *
     * @Column(name="lq_HCWResponse", type="string", length=55, nullable=true)
     */
    private $lqHcwresponse;

    /**
     * @var string
     *
     * @Column(name="lq_HCWFindings", type="string", length=200, nullable=false)
     */
    private $lqHcwfindings;

    /**
     * @var string
     *
     * @Column(name="lq_assessorResponse", type="string", length=55, nullable=true)
     */
    private $lqAssessorresponse;

    /**
     * @var string
     *
     * @Column(name="lq_assessorFindings", type="string", length=200, nullable=false)
     */
    private $lqAssessorfindings;

    /**
     * @var \DateTime
     *
     * @Column(name="lq_created", type="datetime", nullable=false)
     */
    private $lqCreated;

    /**
     * @var integer
     *
     * @Column(name="lq_response_count", type="integer", nullable=false)
     */
    private $lqResponseCount;

    /**
     * @var string
     *
     * @Column(name="question_code", type="string", length=8, nullable=false)
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
     * Get lqId
     *
     * @return integer 
     */
    public function getLqId()
    {
        return $this->lqId;
    }

    /**
     * Set lqHcwresponse
     *
     * @param string $lqHcwresponse
     * @return AssessementSymptoms
     */
    public function setLqHcwresponse($lqHcwresponse)
    {
        $this->lqHcwresponse = $lqHcwresponse;
    
        return $this;
    }

    /**
     * Get lqHcwresponse
     *
     * @return string 
     */
    public function getLqHcwresponse()
    {
        return $this->lqHcwresponse;
    }

    /**
     * Set lqHcwfindings
     *
     * @param string $lqHcwfindings
     * @return AssessementSymptoms
     */
    public function setLqHcwfindings($lqHcwfindings)
    {
        $this->lqHcwfindings = $lqHcwfindings;
    
        return $this;
    }

    /**
     * Get lqHcwfindings
     *
     * @return string 
     */
    public function getLqHcwfindings()
    {
        return $this->lqHcwfindings;
    }

    /**
     * Set lqAssessorresponse
     *
     * @param string $lqAssessorresponse
     * @return AssessementSymptoms
     */
    public function setLqAssessorresponse($lqAssessorresponse)
    {
        $this->lqAssessorresponse = $lqAssessorresponse;
    
        return $this;
    }

    /**
     * Get lqAssessorresponse
     *
     * @return string 
     */
    public function getLqAssessorresponse()
    {
        return $this->lqAssessorresponse;
    }

    /**
     * Set lqAssessorfindings
     *
     * @param string $lqAssessorfindings
     * @return AssessementSymptoms
     */
    public function setLqAssessorfindings($lqAssessorfindings)
    {
        $this->lqAssessorfindings = $lqAssessorfindings;
    
        return $this;
    }

    /**
     * Get lqAssessorfindings
     *
     * @return string 
     */
    public function getLqAssessorfindings()
    {
        return $this->lqAssessorfindings;
    }

    /**
     * Set lqCreated
     *
     * @param \DateTime $lqCreated
     * @return AssessementSymptoms
     */
    public function setLqCreated($lqCreated)
    {
        $this->lqCreated = $lqCreated;
    
        return $this;
    }

    /**
     * Get lqCreated
     *
     * @return \DateTime 
     */
    public function getLqCreated()
    {
        return $this->lqCreated;
    }

    /**
     * Set lqResponseCount
     *
     * @param integer $lqResponseCount
     * @return AssessementSymptoms
     */
    public function setLqResponseCount($lqResponseCount)
    {
        $this->lqResponseCount = $lqResponseCount;
    
        return $this;
    }

    /**
     * Get lqResponseCount
     *
     * @return integer 
     */
    public function getLqResponseCount()
    {
        return $this->lqResponseCount;
    }

    /**
     * Set questionCode
     *
     * @param string $questionCode
     * @return AssessementSymptoms
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
     * @return AssessementSymptoms
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
     * @return AssessementSymptoms
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