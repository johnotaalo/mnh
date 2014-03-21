<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * SurveyCategories
 *
 * @Table(name="survey_categories")
 * @Entity
 */
class SurveyCategories
{
    /**
     * @var integer
     *
     * @Column(name="sc_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $scId;

    /**
     * @var string
     *
     * @Column(name="sc_name", type="string", length=45, nullable=true)
     */
    private $scName;


    /**
     * Get scId
     *
     * @return integer 
     */
    public function getScId()
    {
        return $this->scId;
    }

    /**
     * Set scName
     *
     * @param string $scName
     * @return SurveyCategories
     */
    public function setScName($scName)
    {
        $this->scName = $scName;
    
        return $this;
    }

    /**
     * Get scName
     *
     * @return string 
     */
    public function getScName()
    {
        return $this->scName;
    }
}
