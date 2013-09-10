<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="mch_ortcorner_aspects")
	 */
 class E_MCH_Ortcorner_Aspects{
 	
   /**
	* @Id
	* @Column(name="idOrtCornerAspect", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idOrtCornerAspect;
	
   /**
	* @Column(name="response", type="string",length=255, nullable=true)
	* */
	private $response;
	
	/**
	* @ManyToOne(targetEntity="mch_questions",inversedBy="questionCode")
	* @Column(name="questionCode", type="string",length=10)
	* */
	private $questionCode;
	 
	
	/**
	* @ManyToOne(targetEntity="facility",inversedBy="facilityMFC")
	* @Column(name="facilityID", type="string",length=55)
	* */
	private $facilityID;
	
	/**
	* @Column(name="createdAt", type="datetime",nullable=false)
	* */
	private $createdAt;
	 
	 
	public function getOrtCornerAspectID() {
			return $this ->idOrtCornerAspect;
	}
	
	public function setOrtCornerAspectID($idOrtCornerAspect) {$this -> idOrtCornerAspect=$idOrtCornerAspect;}
	
	 
	public function getResponse() {
			return $this -> response;
	}
	
	public function setResponse($response) { $this -> response = $response;
	}
	
	public function getQuestionCode() {
			return $this -> questionCode;
	}
	
	public function setQuestionCode($questionCode) { $this -> questionCode = $questionCode;
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