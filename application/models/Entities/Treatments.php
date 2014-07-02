<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * Treatments
 *
 * @Table(name="treatments")
 * @Entity
 */
class Treatments
{
    /**
     * @var integer
     *
     * @Column(name="treatment_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $treatmentId;

    /**
     * @var string
     *
     * @Column(name="treatment_name", type="string", length=255, nullable=false)
     */
    private $treatmentName;

    /**
     * @var string
     *
     * @Column(name="treatment_code", type="string", length=6, nullable=false)
     */
    private $treatmentCode;

    /**
     * @var string
     *
     * @Column(name="treatment_for", type="string", length=3, nullable=false)
     */
    private $treatmentFor;


    /**
     * Get treatmentId
     *
     * @return integer 
     */
    public function getTreatmentId()
    {
        return $this->treatmentId;
    }

    /**
     * Set treatmentName
     *
     * @param string $treatmentName
     * @return Treatments
     */
    public function setTreatmentName($treatmentName)
    {
        $this->treatmentName = $treatmentName;
    
        return $this;
    }

    /**
     * Get treatmentName
     *
     * @return string 
     */
    public function getTreatmentName()
    {
        return $this->treatmentName;
    }

    /**
     * Set treatmentCode
     *
     * @param string $treatmentCode
     * @return Treatments
     */
    public function setTreatmentCode($treatmentCode)
    {
        $this->treatmentCode = $treatmentCode;
    
        return $this;
    }

    /**
     * Get treatmentCode
     *
     * @return string 
     */
    public function getTreatmentCode()
    {
        return $this->treatmentCode;
    }

    /**
     * Set treatmentFor
     *
     * @param string $treatmentFor
     * @return Treatments
     */
    public function setTreatmentFor($treatmentFor)
    {
        $this->treatmentFor = $treatmentFor;
    
        return $this;
    }

    /**
     * Get treatmentFor
     *
     * @return string 
     */
    public function getTreatmentFor()
    {
        return $this->treatmentFor;
    }
}
