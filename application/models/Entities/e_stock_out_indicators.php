<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="stock_out_indicators")
	 */
 class E_Stock_out_indicators{
 	
   /**
	* @Id
	* @Column(name="idStock_Out_Indicators", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idStock_Out_Indicators;
	
   /**
	* @Column(name="indicatorName", type="string",length=55, nullable=false)
	* */
	private $indicatorName;
	 
	public function getidStock_Out_Indicators() {
			return $this -> idStock_Out_Indicators;
	}
	
	public function setidStock_Out_Indicators($idStock_Out_Indicators) { $this -> idStock_Out_Indicators= $idStock_Out_Indicators;
	}
	 
	public function getindicatorName() {
			return $this -> indicatorName;
	}
	
	public function setindicatorName($indicatorName) { $this -> indicatorName = $indicatorName;
	}
}
?>