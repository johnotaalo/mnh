<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="challenges")
	 */
 class E_Challenges{
 	
   /**
	* @Id
	* @Column(name="challenge_id", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $challenge_id;
	
   /**
	* @Column(name="challenge_name", type="string",length=55, nullable=false)
	* */
	private $challenge_name;
	 
	public function getchallenge_id() {
			return $this -> challenge_id;
	}
	
	public function setchallenge_id($challenge_id) { $this -> challenge_id= $challenge_id;
	}
	 
	public function getchallenge_name() {
			return $this -> challenge_name;
	}
	
	public function setchallenge_name($challenge_name) { $this -> challenge_name = $challenge_name;
	}
}