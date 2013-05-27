<?php
/**
 *
 */

interface Tx_Vertretungsplan_Provider_StandInProviderInterface {

	/**
	 * @return String
	 */
	public function getDirectory();

	/**
	 * @param $directory
	 * @return void
	 */
	public function setDirectory($directory);

	/**
	 * @return String
	 */
	public function readPlan();

}