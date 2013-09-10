<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="signal_functions")
	 */
 class E_Signal_Function{
 	
   /**
	* @Id
	* @Column(name="idSignalFunctions", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idSignalFunctions;
	
   /**
	* @Column(name="signalName", type="string",length=55, nullable=false)
	* */
	private $signalName;
	
	/**
	* @Column(name="signalCode", type="string",length=55, nullable=false)
	* */
	private $signalCode;
	 
	public function getIdSignalFunctions() {
			return $this -> idSignalFunctions;
	}
	
	public function setIdSignalFunctions($idSignalFunctions) { $this -> idSignalFunctions= $idSignalFunctions;
	}
	 
	public function getSignalName() {
			return $this -> signalName;
	}
	
	public function setSignalName($signalName) { $this -> signalName = $signalName;
	}
	
	public function getSignalCode() {
			return $this -> signalCode;
	}
	
	public function setSignalCode($signalCode) { $this -> signalCode = $signalCode;
	}
}
?>