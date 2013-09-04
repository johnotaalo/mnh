<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="commodity")
	 */
 class E_Commodity{
 	
   /**
	* @Id
	* @Column(name="idCommodity", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $commodityID;
	
   /**
	* @Column(name="commodityCode", type="string",length=45, nullable=false)
	* */
	private $commodityCode;
	
	/**
	* @Column(name="unit", type="string",length=45, nullable=false)
	* */
	private $commodityUnit;
	
	
	/**
	* @Column(name="commodityName", type="string",length=45, nullable=false)
	* */
	private $commodityName;
	
	/**
	* @Column(name="commodityFor", type="string",length=3, nullable=false)
	* */
	private $commodityFor;
	 
	public function getCommodityID() {
			return $this -> commodityID;
	}
	
	public function setCommodityID($commodityID) { $this -> commodityID = $commodityID;
	}
	 
	public function getCommodityName() {
			return $this -> commodityName;
	}
	
	public function setCommodityName($commodityName) { $this -> commodityName = $commodityName;
	}
	
	public function getCommodityCode() {
			return $this -> commodityCode;
	}
	
	public function setCommodityCode($commodityCode) { $this -> commodityCode = $commodityCode;
	}
	
	public function getCommodityUnit() {
			return $this -> commodityUnit;
	}
	
	public function setCommodityUnit($commodityUnit) { $this -> commodityUnit = $commodityUnit;
	}
	
	public function getCommodityFor() {
			return $this -> commodityFor;
	}
	
	public function setCommodityFor($commodityFor) { $this -> commodityFor = $commodityFor;
	}
}
?>