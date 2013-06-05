<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="facility_type")
	 */
 class E_Conducted_Signals{
 	
   /**
	* @Id
	* @Column(name="signal_id", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $signal_id;
	
   /**
	* @Column(name="signal_name", type="string",length=55, nullable=false)
	* */
	private $signal_name;
	
	private $flag;
	
	public function getSignalID() {
			return $this -> signal_id;
	}
	
	public function setSignalID($signal_id) { $this -> signal_id = $signal_id;
	}
	 
	public function getSignalName() {
			return $this -> signal_name;
	}
	
	public function setSignalName($signal_name) { $this -> signal_name = $signal_name;
	}
	
	
	public function getSignalFlag() {
			return $this -> flag;
	}
	
	public function setSignalFlag($flag) { $this -> flag = $flag;
	}
}
?>