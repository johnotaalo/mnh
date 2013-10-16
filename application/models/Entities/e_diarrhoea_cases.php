<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="diarrhoea_cases")
 */

class E_Diarrhoea_Cases{

	/**
	 * @Id
	 * @Column(name="diarrhoeaCaseID", type="integer", length=11, nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 * */
	private $diarrhoeaCaseID;

	/**
	 *  @Column(name="numberOfDiarrhoeaCases", type="integer",nullable=false)
	 * */
	private $numberOfDiarrhoeaCases;

	/**
	 * @ManyToOne(targetEntity="facility",inversedBy="facilityMFC")
	 * @Column(name="facilityCode", type="string", length=45, nullable=false)
	 * */
	private $facilityCode;
	
	/**
	 * @Column(name="createdAt", type="datetime", nullable=false)
	 * */
	private $createdAt;
	
	/**
	 * @Column(name="updatedAt", type="datetime", nullable=true)
	 * */
	private $updatedAt;

    
	public function getDiarrhoeaCaseID() {
		return $this -> diarrhoeaCaseID;
	}

	public function setDiarrhoeaCaseID($diarrhoeaCaseID) {
		$this -> diarrhoeaCaseID = $diarrhoeaCaseID;
	}

    
	public function getNumberOfDiarrhoeaCases() {
		return $this -> numberOfDiarrhoeaCases;
	}
	
	public function setNumberOfDiarrhoeaCases($numberOfDiarrhoeaCases) {
	        $this -> numberOfDiarrhoeaCases=$numberOfDiarrhoeaCases;
	}
	
	 public function getFacilityCode() {
		return $this -> facilityCode;
	}

   
	public function setFacilityCode($facilityCode) {
		$this -> facilityCode = $facilityCode;
	}
	
	public function getCreatedAt() {
			return $this -> createdAt;
	}
	
	public function setCreatedAt($createdAt) { $this ->createdAt = $createdAt;
	}
	
	public function getUpdatedAt() {
			return $this -> updatedAt;
	}
	
	public function setUpdatedAt($updatedAt) { $this ->updatedAt = $updatedAt;
	}

}
?>