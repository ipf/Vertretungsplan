<?php

namespace Ipf\Vertretungsplan\Provider;
/**
 * Provider and Parser for Untis Schedules
 */

require \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('vertretungsplan') . 'Classes/Contrib/autoload.php';


class UntisProvider implements StandInProviderInterface {

	/**
	 * @var String directory where the plans are stored
	 */
	protected $location;

	/**
	 * Location of the file for Untis
	 */
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
			$this->weekToCheck = str_pad(date('W'), 2, 0, STR_PAD_LEFT);;
		}
	}

	/**
	 * @return String
	 */
	public function getLocation() {
		$location = $this->settings['storageLocation'] . $this->weekToCheck . '/' . self::PLANFILE;
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

		$processedPlan = '';

		for ($i = 0; $i < 2; $i++) {
			$this->weekToCheck = $this->determineWeekToCheck($i);
			$plan = utf8_encode(file_get_contents(self::getLocation()));
			$processedPlan .= $this->processPlan($plan);
		}

		return $processedPlan;
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
		$domCrawler = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('\Wa72\HtmlPageDom\HtmlPage', $plan);
		$p = $domCrawler->filter('#vertretung')->getInnerHtml();
		return $p;
	}

	/**
	 * @param int $weekOffset
	 * @return int
	 */
	protected function determineWeekToCheck($weekOffset = 0) {
		$week = intval(date('W')) + intval($weekOffset);

		// @TODO
		if ($this->isNextWeekInNextYear($week)) {}
		return $week;
	}

	/**
	 * determines the next week and sets it to the class variable $weekToCheck
	 */
	protected function readPlanForNextWeek() {
		$this->weekToCheck = self::determineWeekToCheck(1);
	}

	/**
	 * Respect year changes
	 * @TODO
	 *
	 * @param int $weekToCheck
	 * @return bool
	 */
	protected function isNextWeekInNextYear($weekToCheck) {
		return FALSE;
	}

}