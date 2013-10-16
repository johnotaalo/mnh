<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="months")
	 */
 class E_Months{
 	
   /**
	* @Id
	* @Column(name="idMonths", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idMonths;
	
   /**
	* @Column(name="Year", type="string",length=55, nullable=false)
	* */
	private $Year;
	 
	  /**
	* @Column(name="Month", type="string",length=55, nullable=false)
	* */
	private $Month;
	public function getidMonths() {
			return $this -> idMonths;
	}
	
	public function setidMonths($idMonths) { $this -> idMonths= $idMonths;
	}
	 
	public function getYear() {
			return $this -> Year;
	}
	
	public function setYear($Year) { $this -> Year = $Year;
	}
	
	public function getMonth() {
			return $this -> Month;
	}
	
	public function setYear($Month) { $this -> Month = $Month;
	}
}
?>