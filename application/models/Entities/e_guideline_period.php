<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="signal_functions")
	 */
 class E_Guideline_Period{
 	
   /**
	* @Id
	* @Column(name="idGuideline_periods", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idGuideline_periods;
	
   /**
	* @Column(name="guideline_periodName", type="string",length=55, nullable=false)
	* */
	private $guideline_periodName;
	 
	public function getidGuideline_periods() {
			return $this -> idGuideline_periods;
	}
	
	public function setidGuideline_periods($idGuideline_periods) { $this -> idGuideline_periods= $idGuideline_periods;
	}
	 
	public function getguideline_periodName() {
			return $this -> guideline_periodName;
	}
	
	public function setguideline_periodName($guideline_periodName) { $this -> guideline_periodName = $guideline_periodName;
	}
}
?>