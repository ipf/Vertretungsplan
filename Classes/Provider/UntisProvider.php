<?php
/**
 *
 */

class Tx_Vertretungsplan_Provider_UntisProvider implements Tx_Vertretungsplan_Provider_StandInProviderInterface {

	protected $directory;

	const PLANFILE = 'w/w00000.htm';

	/**
	 * @return String
	 */
	public function getDirectory() {
		return $this->directory . self::PLANFILE;
	}

	/**
	 * @param $directory
	 * @return String
	 */
	public function setDirectory($directory) {
		$this->directory = $directory . self::PLANFILE;
	}

	/**
	 * @return String
	 */
	public function readPlan() {
		return 'Untis';
	}

}