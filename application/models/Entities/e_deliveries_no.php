<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="deliveries_no")
	 */
 class E_Deliveries_No{
 	
   /**
	* @Id
	* @Column(name="idDeliveriesNo", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idDeliveriesNo;
	
   /**
	* @Column(name="Year", type="string",length=4, nullable=false)
	* */
	private $Year;
	 
	/**
	* @Column(name="Month", type="string",length=15, nullable=false)
	* */
	private $Month;
	
	/**
	* @Column(name="numberOfDeliveries", type="integer",length=11, nullable=false)
	* */
	private $numberOfDeliveries;
	
	/**
	* @Column(name="facilityID", type="string",length=55)
	* */
	private $facilityID;
	
	
	
	public function getIdDeliveriesNo() {
			return $this -> idDeliveriesNo;
	}
	
	public function setIdDeliveriesNo($idDeliveriesNo) { $this -> idDeliveriesNo= $idDeliveriesNo;
	}
	 
	public function getYear() {
			return $this -> Year;
	}
	
	public function setYear($Year) { $this -> Year = $Year;
	}
	
	public function getMonth() {
			return $this -> Month;
	}
	
	public function setMonth($Month) { $this -> Month = $Month;
	}
	
	public function getNumberOfDeliveries() {
			return $this -> numberOfDeliveries;
	}
	
	public function setNumberOfDeliveries($numberOfDeliveries) { $this -> numberOfDeliveries = $numberOfDeliveries;
	}
	
	public function getFacilityID() {
			return $this -> facilityID;
	}
	
	public function setFacilityID($facilityID) { $this -> facilityID = $facilityID;
	}
}
?>