<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * FormSteps
 *
 * @Table(name="form_steps")
 * @Entity
 */
class FormSteps
{
    /**
     * @var integer
     *
     * @Column(name="fs_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $fsId;

    /**
     * @var string
     *
     * @Column(name="fs_name", type="string", length=45, nullable=false)
     */
    private $fsName;


    /**
     * Get fsId
     *
     * @return integer 
     */
    public function getFsId()
    {
        return $this->fsId;
    }

    /**
     * Set fsName
     *
     * @param string $fsName
     * @return FormSteps
     */
    public function setFsName($fsName)
    {
        $this->fsName = $fsName;
    
        return $this;
    }

    /**
     * Get fsName
     *
     * @return string 
     */
    public function getFsName()
    {
        return $this->fsName;
    }
}
