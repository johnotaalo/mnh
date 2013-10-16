<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="bemonc_functions")
	 */
 class E_Bemonc_Functions{
 	
   /**
	* @Id
	* @Column(name="idBemoncFunctions", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idBemoncFunctions;
	
   /**
	* @Column(name="conducted", type="string",length=55, nullable=false)
	* */
	private $conducted;
	
	   /**
	* @Column(name="challengeID", type="string",length=55)
	* */
	private $challengeID;
	 
	 
	/**
	* @Column(name="signalFunctionsID", type="string",length=55)
	* */
	private $signalFunctionsID;
	
	/**
	* @Column(name="facilityID", type="string",length=55)
	* */
	private $facilityID;
	
	/**
	* @Column(name="createdAt", type="datetime",nullable=false)
	* */
	private $createdAt;
	 
	 
	public function getidBemobncFunctions() {
			return $this -> idBemoncFunctions;
	}
	
	public function setidBemobncFunctions($bemoncID) {$this -> idBemoncFunctions=$bemoncID;}
	
	 
	public function getConducted() {
			return $this -> conducted;
	}
	
	public function setConducted($conducted) { $this -> conducted = $conducted;
	}
	
	public function getChallengeID() {
			return $this -> challengeID;
	}
	
	public function setChallengeID($challengeID) { $this -> challengeID = $challengeID;
	}
	
	public function getSignalFunctionsID() {
			return $this -> signalFunctionsID;
	}
	
	public function setSignalFunctionsID($signalFunctionsID) { $this -> signalFunctionsID = $signalFunctionsID;
	}
	
	public function getFacilityCode() {
			return $this -> facilityID;
	}
	
	public function setFacilityCode($facilityID) { $this -> facilityID = $facilityID;
	}
	
	public function getCreatedAt() {
			return $this -> createdAt;
	}
	
	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;}
}
?>