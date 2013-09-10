<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="mch_indicators")
	 */
 class E_MCH_Indicators{
   /**
	* @Id
	* @Column(name="indicatorID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $indicatorID;
	
   /**
	* @Column(name="indicatorName", type="string",length=255, nullable=false)
	* */
	private $indicatorName;
	
	/**
	* @Column(name="indicatorCode", type="string",length=6, nullable=false)
	* */
	private $indicatorCode;
	
	/**
	* @Column(name="indicatorFor", type="string",length=3, nullable=false)
	* */
	private $indicatorFor;
	 
	public function getIndicatorID() {
			return $this -> indicatorID;
	}
	
	public function setIndicatorID($indicatorID) { $this -> indicatorID= $indicatorID;
	}
	 
	public function getIndicatorName() {
			return $this -> indicatorName;
	}
	
	public function setIndicatorName($indicatorName) { $this -> indicatorName = $indicatorName;
	}
	
	public function getIndicatorCode() {
			return $this -> indicatorCode;
	}
	
	public function setIndicatorCode($indicatorCode) { $this -> indicatorCode = $indicatorCode;
	}
	
	public function getIndicatorFor() {
			return $this -> indicatorFor;
	}
	
	public function setIndicatorFor($indicatorFor) { $this -> indicatorFor = $indicatorFor;
	}
}
?>