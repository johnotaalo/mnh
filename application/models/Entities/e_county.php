<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="county")
	 */
 class E_county{
 	
   /**
	* @Id
	* @Column(name="countyID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $countyID;
	
   /**
	* @Column(name="countyName", type="string",length=45, nullable=false)
	* */
	private $countyName;
	
	/**
	* @Column(name="countyFusionMapId", type="integer",length=2, nullable=false)
	* */
	private $countyFusionMapId;
	 
	public function getCountyID() {
			return $this -> countyID;
	}
	
	public function setCountyID($countyID) { $this -> countyID = $countyID;
	}
	 
	public function getCountyName() {
			return $this -> countyName;
	}
	
	public function setCountyName($countyName) { $this -> countyName = $countyName;
	}
	
	public function getCountyFusionMapId() {
			return $this -> countyFusionMapId;
	}
	
	public function setCountyFusionMapId($countyFusionMapId) { $this -> countyFusionMapId = $countyFusionMapId;
	}
}
?>