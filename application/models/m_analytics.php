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
	public function getOngoingSessions() {

	}

}
