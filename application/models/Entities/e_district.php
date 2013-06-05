<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="district")
	 */
 class E_District{
 	
   /**
	* @Id
	* @Column(name="districtID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $districtID;
	
   /**
	* @Column(name="districtName", type="string",length=45, nullable=true)
	* */
	private $districtName;
	 
	public function getDistrictID() {
			return $this -> districtID;
	}
	
	public function setDistrictID($districtID) { $this -> districtID = $districtID;
	}
	 
	public function getDistrictName() {
			return $this -> districtName;
	}
	
	public function setDistrictName($districtName) { $this -> districtName = $districtName;
	}
}
?>