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
	 * Plugin 'legacy Vertretungsplan' for the 'vertretungsplan' extension.
	 *
	 * @author Ingo Pfennigstorf <i.pfennigstorf@gmail.com>
	 * @package TYPO3
	 * @subpackage tx_vertretungsplan
	 */
	class tx_vertretungsplan_pi2 extends tslib_pibase {
		var $prefixId = 'tx_vertretungsplan_pi2';
		var $scriptRelPath = 'pi1/class.tx_vertretungsplan_pi2.php';
		var $extKey = 'vertretungsplan';

		/**
		 * Main method of the legacy Vertretungsplan Plugin
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

				// Query the database for the current plan
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
				'plan, crdate',
				'tx_vertretungsplan_upload',
				'',
				'',
				'crdate DESC',
				'1'
			);

			while ($row1 = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
				$content = $row1['plan'];
			}

			return $this->pi_wrapInBaseClass($content);
		}
	}

	if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vertretungsplan/pi1/class.tx_vertretungsplan_pi1.php']) {
		include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/vertretungsplan/pi1/class.tx_vertretungsplan_pi1.php']);
	}

?>