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
	 
	public function getIndicatorID() {
			return $this -> treatmentID;
	}
	
	public function setIndicatorID($treatmentID) { $this -> treatmentID= $treatmentID;
	}
	 
	public function getIndicatorName() {
			return $this -> treatmentName;
	}
	
	public function setIndicatorName($treatmentName) { $this -> treatmentName = $treatmentName;
	}
	
	public function getIndicatorCode() {
			return $this -> treatmentCode;
	}
	
	public function setIndicatorCode($treatmentCode) { $this -> treatmentCode = $treatmentCode;
	}
	
	public function getIndicatorFor() {
			return $this -> treatmentFor;
	}
	
	public function setIndicatorFor($treatmentFor) { $this -> treatmentFor = $treatmentFor;
	}
}
?>