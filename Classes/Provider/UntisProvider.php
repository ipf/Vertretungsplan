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
		return $this->directory . date('W') . '/' . self::PLANFILE;
	}

	/**
	 * @param $directory
	 * @return String
	 */
	public function setDirectory($directory) {
		$this->directory = $directory . date('W') . '/' . self::PLANFILE;
	}

	/**
	 * @return String
	 */
	public function readPlan() {
		$plan = file_get_contents($this->directory);
		$plan = utf8_encode($plan);
		$plan = str_replace('&nbsp;', '', $plan);
		$dom = new DOMDocument();
		$dom->loadHTML($plan);
		$dom->getElementsByTagName('body')->item(0);
		return $dom->saveHTML();
	}

	protected function processPlan($plan) {

	}

}