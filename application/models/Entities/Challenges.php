<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * Challenges
 *
 * @Table(name="challenges")
 * @Entity
 */
class Challenges
{
    /**
     * @var integer
     *
     * @Column(name="challenge_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $challengeId;

    /**
     * @var string
     *
     * @Column(name="challenge_code", type="string", length=45, nullable=false)
     */
    private $challengeCode;

    /**
     * @var string
     *
     * @Column(name="challenge_name", type="string", length=45, nullable=true)
     */
    private $challengeName;


    /**
     * Get challengeId
     *
     * @return integer 
     */
    public function getChallengeId()
    {
        return $this->challengeId;
    }

    /**
     * Set challengeCode
     *
     * @param string $challengeCode
     * @return Challenges
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
     * Set challengeName
     *
     * @param string $challengeName
     * @return Challenges
     */
    public function setChallengeName($challengeName)
    {
        $this->challengeName = $challengeName;
    
        return $this;
    }

    /**
     * Get challengeName
     *
     * @return string 
     */
    public function getChallengeName()
    {
        return $this->challengeName;
    }
}
