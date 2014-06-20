<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * LogIndicators
 *
 * @Table(name="log_indicators")
 * @Entity
 */
class LogIndicators
{
    /**
     * @var integer
     *
     * @Column(name="li_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $liId;

    /**
     * @var string
     *
     * @Column(name="li_response", type="string", length=6, nullable=true)
     */
    private $liResponse;

    /**
     * @var \DateTime
     *
     * @Column(name="li_created", type="datetime", nullable=false)
     */
    private $liCreated;

    /**
     * @var string
     *
     * @Column(name="indicator_code", type="string", length=8, nullable=false)
     */
    private $indicatorCode;

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
     * @var string
     *
     * @Column(name="li_hcwResponse", type="string", length=45, nullable=true)
     */
    private $liHcwresponse;

    /**
     * @var string
     *
     * @Column(name="li_assessorResponse", type="string", length=45, nullable=true)
     */
    private $liAssessorresponse;

    /**
     * @var string
     *
     * @Column(name="li_hcwFindings", type="string", length=45, nullable=true)
     */
    private $liHcwfindings;

    /**
     * @var string
     *
     * @Column(name="li_assessorFindings", type="string", length=45, nullable=true)
     */
    private $liAssessorfindings;


    /**
     * Get liId
     *
     * @return integer
     */
    public function getLiId()
    {
        return $this->liId;
    }

    /**
     * Set liResponse
     *
     * @param string $liResponse
     * @return LogIndicators
     */
    public function setLiResponse($liResponse)
    {
        $this->liResponse = $liResponse;

        return $this;
    }

    /**
     * Get liResponse
     *
     * @return string
     */
    public function getLiResponse()
    {
        return $this->liResponse;
    }

    /**
     * Set liCreated
     *
     * @param \DateTime $liCreated
     * @return LogIndicators
     */
    public function setLiCreated($liCreated)
    {
        $this->liCreated = $liCreated;

        return $this;
    }

    /**
     * Get liCreated
     *
     * @return \DateTime
     */
    public function getLiCreated()
    {
        return $this->liCreated;
    }

    /**
     * Set indicatorCode
     *
     * @param string $indicatorCode
     * @return LogIndicators
     */
    public function setIndicatorCode($indicatorCode)
    {
        $this->indicatorCode = $indicatorCode;

        return $this;
    }

    /**
     * Get indicatorCode
     *
     * @return string
     */
    public function getIndicatorCode()
    {
        return $this->indicatorCode;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return LogIndicators
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
     * @return LogIndicators
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

    /**
     * Set liHcwresponse
     *
     * @param string $liHcwresponse
     * @return LogIndicators
     */
    public function setLiHcwresponse($liHcwresponse)
    {
        $this->liHcwresponse = $liHcwresponse;

        return $this;
    }

    /**
     * Get liHcwresponse
     *
     * @return string
     */
    public function getLiHcwresponse()
    {
        return $this->liHcwresponse;
    }

    /**
     * Set liAssessorresponse
     *
     * @param string $liAssessorresponse
     * @return LogIndicators
     */
    public function setLiAssessorresponse($liAssessorresponse)
    {
        $this->liAssessorresponse = $liAssessorresponse;

        return $this;
    }

    /**
     * Get liAssessorresponse
     *
     * @return string
     */
    public function getLiAssessorresponse()
    {
        return $this->liAssessorresponse;
    }

    /**
     * Set liHcwfindings
     *
     * @param string $liHcwfindings
     * @return LogIndicators
     */
    public function setLiHcwfindings($liHcwfindings)
    {
        $this->liHcwfindings = $liHcwfindings;

        return $this;
    }

    /**
     * Get liHcwfindings
     *
     * @return string
     */
    public function getLiHcwfindings()
    {
        return $this->liHcwfindings;
    }

    /**
     * Set liAssessorfindings
     *
     * @param string $liAssessorfindings
     * @return LogIndicators
     */
    public function setLiAssessorfindings($liAssessorfindings)
    {
        $this->liAssessorfindings = $liAssessorfindings;

        return $this;
    }

    /**
     * Get liAssessorfindings
     *
     * @return string
     */
    public function getLiAssessorfindings()
    {
        return $this->liAssessorfindings;
    }

    /**
     * @var string
     *
     * @Column(name="li_treatments", type="string", length=45, nullable=true)
     */
    private $liTreatments;


    /**
     * Set liTreatments
     *
     * @param string $liTreatments
     * @return LogIndicators
     */
    public function setLiTreatments($liTreatments)
    {
        $this->liTreatments = $liTreatments;

        return $this;
    }

    /**
     * Get liTreatments
     *
     * @return string
     */
    public function getLiTreatments()
    {
        return $this->liTreatments;
    }
}
