<?php
/**
 * Provider and Parser for Untis Schedules
 */

require t3lib_extMgm::extPath('vertretungsplan') . 'Classes/Contrib/autoload.php';


class Tx_Vertretungsplan_Provider_UntisProvider implements Tx_Vertretungsplan_Provider_StandInProviderInterface {

	/**
	 * @var String directory where the plans are stored
	 */
	protected $location;

	const PLANFILE = 'w/w00000.htm';

	/**
	 * @var int week for the plan to be checked
	 */
	protected $weekToCheck;

	/**
	 * @var array
	 */
	protected $settings;

	public function __construct($settings) {

		$this->settings = $settings;

		if (empty($this->weekToCheck)) {
			$this->weekToCheck = date('W');
		}
	}

	/**
	 * @return String
	 */
	public function getLocation() {
		$location = $this->settings['storageLocation'] . $this->weekToCheck . '/' . self::PLANFILE;
		$this->settings['storageLocation'] . $this->weekToCheck . '/' . self::PLANFILE;
		return $location;
	}

	/**
	 * @param $location
	 * @return String
	 */
	public function setLocation($location) {
		$this->location = $this->settings['storageLocation'] . '/' . self::PLANFILE;
	}

	/**
	 * Reads the plan file and passes it to the processor
	 *
	 * @return String
	 */
	public function readPlan() {
		$plan = utf8_encode(file_get_contents(self::getLocation()));
		self::readPlanForNextWeek();
		return $this->processPlan($plan);
	}

	/**
	 * Processes the plan and returns the desired markup
	 *
	 * @param $plan
	 * @return String
	 */
	protected function processPlan($plan) {

		$pattern = '/( \| )*<a href="#\d">\[.*?<\/a>( \| )*/';
		$plan = preg_replace($pattern, '', $plan);

		/**
		 * @var \Wa72\HtmlPageDom\HtmlPage
		 */
		$domCrawler = t3lib_div::makeInstance('\Wa72\HtmlPageDom\HtmlPage', $plan);
		$p = $domCrawler->filter('#vertretung')->getInnerHtml();
		return $p;
	}

	/**
	 * @param int $weekOffset
	 * @return int
	 */
	protected function determineWeekToCheck($weekOffset = 0) {
		$week = intval(date('W')) + intval($weekOffset);
		return $week;
	}

	/**
	 * determines the next week and sets it to the class variable $weekToCheck
	 */
	protected function readPlanForNextWeek() {
		$this->weekToCheck = self::determineWeekToCheck(1);
	}

}