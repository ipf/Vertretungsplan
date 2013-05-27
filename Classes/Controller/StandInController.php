<?php
/**
 * Controller
 */

class Tx_Vertretungsplan_Controller_StandInController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Vertretungsplan_Provider_StandInProviderInterface
	 */
	protected $provider;

	public function initializeAction() {
		$this->provider = $this->getProvider();
	}

	public function indexAction() {}


	protected function getProvider() {
		if ($this->settings['provider']) {
			$this->provider = $this->settings['provider'];
		} else {
			throw new t3lib_error_Exception("No Provider configured in TypoScript", 1369645294);
		}
	}

}