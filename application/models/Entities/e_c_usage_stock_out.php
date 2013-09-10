<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="c_usage_stock_out")
	 */
 class E_C_Usage_stock_out{
 	
   /**
	* @Id
	* @Column(name="usage_stock_outID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $usage_stock_outID;
	
   /**
	* @Column(name="usage", type="integer",length=55, nullable=false)
	* */
	private $usage;
	
	   /**
	* @Column(name="monthID", type="integer",length=55)
	* */
	private $monthID;
	 
	 
	    /**
	* @Column(name="stock_out_indicatorsID", type="integer",length=55)
	* */
	private $stock_out_indicatorsID;
	/**
	* @Column(name="commodityID", type="integer",length=55)
	* */
	private $commodityID;
	 
	 
	public function getusage_stock_outID() {
			return $this -> usage_stock_outID;
	}
	
	public function setchallenge_id($challenge_id) { $this -> challenge_id= $challenge_id;
	}
	 
	public function getusage() {
			return $this -> usage;
	}
	
	public function setusage($usage) { $this -> usage = $usage;
	}
	
	public function getmonthID() {
			return $this -> monthID;
	}
	
	public function setmonthID($monthID) { $this -> monthID = $monthID;
	}
	
	public function getstock_out_indicatorsID() {
			return $this -> stock_out_indicatorsID;
	}
	
	public function setstock_out_indicatorsID($stock_out_indicatorsID) { $this -> stock_out_indicatorsID = $stock_out_indicatorsID;
	}
	
	public function getcommodityID() {
			return $this -> commodityID;
	}
	
	public function setcommodityID($commodityID) { $this -> commodityID = $commodityID;
	}
}
?>