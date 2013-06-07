<?php
/**
 *
 */

interface Tx_Vertretungsplan_Provider_StandInProviderInterface {

	/**
	 * @return String
	 */
	public function getLocation();

	/**
	 * @param String $location
	 * @return void
	 */
	public function setLocation($location);

	/**
	 * @return String
	 */
	public function readPlan();

}