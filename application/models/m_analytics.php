<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * @description Model contains query definitions to extract data for analytical purposes
 * @param entities
 * @author John Adamsy
 * @modified June 14th 2013
 * */

//for the query builder
use Doctrine\ORM\Query\ResultSetMappingBuilder;

class M_Analytics extends MY_Model {
	/*user variables*/
	var $dataSet, $final_data_set, $query, $rsm;

	/*constructor*/
	function __construct() {
		parent::__construct();
		//var initialization
		$this -> dataSet = $this -> query = null;

	}

	/**
	 * Community Strategy
	 */
	public function getCommunityStrategy() {

	}

	/*
	 * Guidelines Availability
	 */
	public function getGuidelinesAvailability() {

	}

	/*
	 * Trained Staff
	 */
	public function getTrainedStaff() {

	}

	/*
	 * Commodity Availability
	 */
	public function getCommodityAvailability() {

	}

	/*
	 * Services to Children with Diarrhoea
	 */
	public function getChildrenServices() {

	}

	/*
	 * Danger Signs assessed in Ongoing Sessions
	 */
	public function getDangerSigns() {

	}

	/*
	 * Tasks performed in Ongoing Sessions
	 */
	public function getActionsPerformed() {

	}

	/*
	 * Counsel on Ongoing Sessions
	 */
	public function getCounselGiven() {

	}

	/*
	 * Get Tools in Units
	 */

	public function getTools() {

	}

	/*
	 * Diarrhoea case numbers per Month
	 */
	public function getDiarrhoeaCaseNumbers() {

	}

	/*
	 * Diarrhoea case treatments
	 */

	public function getDiarrhoeaCaseTreatment() {

	}

	/*
	 * ORT Corner Assessment
	 */
	public function getORTCornerAssessment() {

	}

	/*
	 * Availability, Location and Functionality of Equipement at ORT Corner
	 */
	public function getORTCornerEquipmemnt() {

	}

	/*
	 * Availability, Location and Functionality of Supplies at ORT Corner
	 */
	public function getORTCornerSupplies() {

	}

	/*
	 *  Availability, Location and Functionality of Electricity and Hardware Resources
	 */
	public function getResources() {

	}

}
