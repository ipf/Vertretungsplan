<?php
	/***************************************************************
	 *  Copyright notice
	 *
	 *  (c) 2011 Ingo Pfennigstorf <i.pfennigstorf@gmail.com>
	 *  All rights reserved
	 *
	 *  This script is part of the TYPO3 project. The TYPO3 project is
	 *  free software; you can redistribute it and/or modify
	 *  it under the terms of the GNU General Public License as published by
	 *  the Free Software Foundation; either version 2 of the License, or
	 *  (at your option) any later version.
	 *
	 *  The GNU General Public License can be found at
	 *  http://www.gnu.org/copyleft/gpl.html.
	 *
	 *  This script is distributed in the hope that it will be useful,
	 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
	 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 *  GNU General Public License for more details.
	 *
	 *  This copyright notice MUST APPEAR in all copies of the script!
	 ***************************************************************/

	require_once(PATH_tslib . 'class.tslib_pibase.php');

	/**
	 * Plugin 'Vertretungsplan' for the 'vertretungsplan' extension.
	 *
	 * @author Ingo Pfennigstorf <i.pfennigstorf@gmail.com>
	 * @package TYPO3
	 * @subpackage tx_vertretungsplan
	 */
	class tx_vertretungsplan_pi1 extends tslib_pibase {
		var $prefixId = 'tx_vertretungsplan_pi1';
		var $scriptRelPath = 'pi1/class.tx_vertretungsplan_pi1.php';
		var $extKey = 'vertretungsplan';

		/**
		 * Main method of the Vertretungsplan Plugin
		 *
		 * @param string $content: The PlugIn content
		 * @param array $conf: The PlugIn configuration
		 * @return The content that is displayed on the website
		 */
		function main($content, $conf) {
			$this->conf = $conf;
			$this->pi_setPiVarDefaults();
			$this->pi_loadLL();
			// Configuring so caching is not expected.
			$this->pi_USER_INT_obj = 1;
			$startDirectory = $this->conf['storageFolder'];

			$planDirectory = '/w/';
			$planFileName = 'w00000.htm';

			// read all contents from a specified directory
			$files = scandir($startDirectory);

			$dirContainer = Array();

			// iterate through all folders and add them to an array
			foreach ($files as $input) {

				if (is_dir($startDirectory . $input) && intval($input) > 0) {

					if ($this->checkThisAndNextWeek($input)) {
						array_push($dirContainer, $input);
					}
				}
			}

			$plaene = $this->getMatchingPlans($dirContainer, $startDirectory, $planDirectory, $planFileName);

			$content = '';

			foreach ($plaene as $plan) {
				$content .= $plan;
			}

			return $this->pi_wrapInBaseClass($content);
		}

		/**
		 * Get matching plans and parse them
		 *
		 * @param $startDirectory
		 * @param $directories
		 * @param $planDirectory
		 * @param $planFileName
		 * @return string
		 */
		protected function getMatchingPlans($directories, $startDirectory, $planDirectory, $planFileName) {

			$plans = array();
			foreach ($directories as $directory) {

				// Plan einlesen
				$planFile = new DOMDocument();
				$planFile->loadHTMLFile($startDirectory . $directory . $planDirectory . $planFileName);
				$planFile->formatOutput = TRUE;
				$planFile->preserveWhiteSpace = FALSE;
				// Beschraenken auf Tabellen
				$tables = $planFile->getElementsByTagName('table');
				$headings = $planFile->getElementsByTagName('big');
				// Anzahl der Tabellen in dem Document
				$nodeListLength = $tables->length;
				// Helfer fuer die Ueberschriften
				$headingCounter = 0;

				for ($j = 0; $j < $nodeListLength; $j++) {

					$rows = $tables->item($j)->getElementsByTagName('tr');

					$table = new DOMDocument();
					$table->formatOutput = TRUE;
					$tb = $table->createElement('table');

					// die ungeraden Tabellen sind die Plaene
					// die geraden Tabellen die Nachrichten zum Tag
					if ($j % 2 !== 0) {
						// Tabellenkoepfe
						$tableHeadRow = $table->createElement('tr');
						$tableHeadRow->appendChild($table->createElement('th', "Neu"));
						$tableHeadRow->appendChild($table->createElement('th', "Datum"));
						$tableHeadRow->appendChild($table->createElement('th', "Lehrkraft"));
						$tableHeadRow->appendChild($table->createElement('th', "Klasse"));
						$tableHeadRow->appendChild($table->createElement('th', "Stunde"));
						$tableHeadRow->appendChild($table->createElement('th', "Fach"));
						$tableHeadRow->appendChild($table->createElement('th', "Raum"));
						$tableHeadRow->appendChild($table->createElement('th', "Vertretung"));
						$tableHeadRow->appendChild($table->createElement('th', "Art"));
						$tableHeadRow->appendChild($table->createElement('th', "Bemerkungen"));
						$tb->appendChild($tableHeadRow);

						foreach ($rows as $row)
						{
							$cols = $row->getElementsByTagName('td');
							$tableRow = $table->createElement('tr');
							for ($i = 0; $i < 10; $i++) {
								$tableRow->appendChild($table->createElement('td', $cols->item($i)->nodeValue));
							}
							$tb->appendChild($tableRow);
						}
					} else {
						// Ueberschrift mit der Datumsangabe
						$h3 = $table->createElement('h3', $headings->item($headingCounter)->nodeValue);
						$table->appendChild($h3);
						// Ueberschrift zu den Nachrichten zum Tag
						$h4 = $table->createElement('h4', "Nachrichten zum Tag");
						$table->appendChild($h4);
						$headingCounter++;
						// Nachrichten zum Tag
						foreach ($rows as $row)
						{
							$cols = $row->getElementsByTagName('td');
							$tableRow = $table->createElement('tr');
							for ($i = 0; $i <= 1; $i++) {
								$tableRow->appendChild($table->createElement('td', $cols->item($i)->nodeValue));
							}
							$tb->appendChild($tableRow);
						}
					}
					$table->appendChild($tb);
					array_push($plans, $table->saveHTML());
				}
			}
			return $plans;
		}

		/**
		 * Plaene fuer diese und die folgende Woche
		 *
		 * @param $weeks
		 * @return boolean
		 */
		protected function checkThisAndNextWeek($weeks) {

			$currentWeek = date('W');

			$nextWeek = $currentWeek + 1;
			$return = FALSE;

			if ($weeks == $currentWeek || $weeks == $nextWeek) {
				$return = TRUE;
			}

			return $return;
		}
	}

	if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vertretungsplan/pi1/class.tx_vertretungsplan_pi1.php']) {
		include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vertretungsplan/pi1/class.tx_vertretungsplan_pi1.php']);
	}

?>