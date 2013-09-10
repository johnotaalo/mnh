<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="mnh_medication")
	 */
 class E_MNH_Medication{
 	
   /**
	* @Id
	* @Column(name="medicationCode", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $medicationCode;
	
   /**
	* @Column(name="medicationName", type="string",length=45, nullable=false)
	* */
	private $medicationName;
	 
	public function getMedicationCode() {
			return $this -> medicationCode;
	}
	
	public function setMedicationCode($medicationCode) { $this -> medicationCode = $medicationCode;
	}
	 
	public function getMedicationName() {
			return $this -> medicationName;
	}
	
	public function setMedicationName($medicationName) { $this -> medicationName = $medicationName;
	}
}
?>