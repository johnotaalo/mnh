<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * SurveyTypes
 *
 * @Table(name="survey_types")
 * @Entity
 */
class SurveyTypes
{
    /**
     * @var integer
     *
     * @Column(name="st_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $stId;

    /**
     * @var string
     *
     * @Column(name="st_name", type="string", length=45, nullable=true)
     */
    private $stName;


    /**
     * Get stId
     *
     * @return integer 
     */
    public function getStId()
    {
        return $this->stId;
    }

    /**
     * Set stName
     *
     * @param string $stName
     * @return SurveyTypes
     */
    public function setStName($stName)
    {
        $this->stName = $stName;
    
        return $this;
    }

    /**
     * Get stName
     *
     * @return string 
     */
    public function getStName()
    {
        return $this->stName;
    }
}
