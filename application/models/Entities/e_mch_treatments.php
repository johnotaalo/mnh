<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="mch_treatments")
	 */
 class E_MCH_Treatments{
   /**
	* @Id
	* @Column(name="treatmentID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $treatmentID;
	
   /**
	* @Column(name="treatmentName", type="string",length=255, nullable=false)
	* */
	private $treatmentName;
	
	/**
	* @Column(name="treatmentCode", type="string",length=6, nullable=false)
	* */
	private $treatmentCode;
	
	/**
	* @Column(name="treatmentFor", type="string",length=3, nullable=false)
	* */
	private $treatmentFor;
	 
	public function getTreatmentID() {
			return $this -> treatmentID;
	}
	
	public function setTreatmentID($treatmentID) { $this -> treatmentID= $treatmentID;
	}
	 
	public function getTreatmentName() {
			return $this -> treatmentName;
	}
	
	public function setTreatmentName($treatmentName) { $this -> treatmentName = $treatmentName;
	}
	
	public function getTreatmentCode() {
			return $this -> treatmentCode;
	}
	
	public function setTreatmentCode($treatmentCode) { $this -> treatmentCode = $treatmentCode;
	}
	
	public function getTreatmentFor() {
			return $this -> treatmentFor;
	}
	
	public function setTreatmentFor($treatmentFor) { $this -> treatmentFor = $treatmentFor;
	}
}
?>