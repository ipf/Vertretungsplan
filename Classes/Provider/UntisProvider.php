<?php
/**
 * Provider and Parser for Untis Schedules
 */

require t3lib_extMgm::extPath('vertretungsplan') . 'Classes/Contrib/autoload.php';


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
	 * Reads the plan file and passes it to the processor
	 *
	 * @return String
	 */
	public function readPlan() {
		$plan = file_get_contents($this->directory);
		return $this->processPlan(utf8_encode($plan));
	}

	/**
	 * Processes the plan and returns the desired markup
	 *
	 * @param $plan
	 * @return String
	 */
	protected function processPlan($plan) {
		/**
		 * @var \Wa72\HtmlPageDom\HtmlPage
		 */
		$domCrawler = t3lib_div::makeInstance('\Wa72\HtmlPageDom\HtmlPage', $plan);
		$p = $domCrawler->filter('#vertretung')->getInnerHtml();
		return $p;
	}

}