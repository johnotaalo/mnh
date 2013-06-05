<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="guidelines")
	 */
   class E_Guideline{
 	
   /**
	* @Id
	* @Column(name="idGuidelines", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idGuidelines;
	
   /**
	* @Column(name="guidelineCode", type="string",length=11, nullable=false)
	* */
	private $guidelineCode;
	 
	/**
	* @Column(name="guidelineName", type="string",length=55, nullable=false)
	* */
	private $guidelineName;
	
	 
	public function getGuidelineId() {
			return $this -> idGuidelines;
	}
	
	public function setGuidelineId($idGuidelines) { $this -> idGuidelines= $idGuidelines;
	}
	 
	public function getGuidelineCode() {
			return $this -> guidelineCode;
	}
	
	public function setGuidelineCode($guidelineCode) { $this -> guidelineCode = $guidelineCode;
	}
	public function getGuidelineName() {
			return $this -> guidelineName;
	}
	
	public function setGuidelineName($guidelineName) { $this -> guidelineName = $guidelineName;
	}
	
}
?>