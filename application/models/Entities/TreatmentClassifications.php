<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * TreatmentClassifications
 *
 * @Table(name="treatment_classifications")
 * @Entity
 */
class TreatmentClassifications
{
    /**
     * @var integer
     *
     * @Column(name="tc_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $tcId;

    /**
     * @var string
     *
     * @Column(name="tc_name", type="string", length=45, nullable=true)
     */
    private $tcName;

    /**
     * @var string
     *
     * @Column(name="tc_for", type="string", length=45, nullable=true)
     */
    private $tcFor;


    /**
     * Get tcId
     *
     * @return integer 
     */
    public function getTcId()
    {
        return $this->tcId;
    }

    /**
     * Set tcName
     *
     * @param string $tcName
     * @return TreatmentClassifications
     */
    public function setTcName($tcName)
    {
        $this->tcName = $tcName;
    
        return $this;
    }

    /**
     * Get tcName
     *
     * @return string 
     */
    public function getTcName()
    {
        return $this->tcName;
    }

    /**
     * Set tcFor
     *
     * @param string $tcFor
     * @return TreatmentClassifications
     */
    public function setTcFor($tcFor)
    {
        $this->tcFor = $tcFor;
    
        return $this;
    }

    /**
     * Get tcFor
     *
     * @return string 
     */
    public function getTcFor()
    {
        return $this->tcFor;
    }
}
