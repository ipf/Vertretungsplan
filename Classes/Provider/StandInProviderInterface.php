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
	 * @return mixed
	 */
	public function setDirectory($directory);

}