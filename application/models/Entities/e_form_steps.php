<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="form_steps")
	 */
 class E_Form_Steps{
 	
   /**
	* @Id
	* @Column(name="stepID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $stepID;
	
   /**
	* @Column(name="stepName", type="string",length=45, nullable=false)
	* */
	private $stepName;
	 
	public function getStepID() {
			return $this -> stepID;
	}
	
	public function setStepID($stepID) { $this -> stepID = $stepID;
	}
	 
	public function getStepName() {
			return $this -> stepName;
	}
	
	public function setStepName($stepName) { $this -> stepName = $stepName;
	}
}
?>