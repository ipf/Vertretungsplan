<?php
/**
 * Controller
 */

class Tx_Vertretungsplan_Controller_StandInController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Vertretungsplan_Provider_StandInProviderInterface
	 */
	protected $provider;

	/**
	 * @var Tx_Extbase_Configuration_ConfigurationManagerInterface
	 */
	protected $configurationManager;

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @param Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager
	 * @return void
	 */
	public function injectConfigurationManager(Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager) {
		$this->configurationManager = $configurationManager;
	}

	/**
	 * Initializes defaults
	 */
	public function initializeAction() {
		$this->settings = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
		$this->provider = $this->getProvider();

		$this->provider->setDirectory($this->getStorageDirectory());
	}

	/**
	 * Read the plan from the provider and pass it to the view
	 */
	public function indexAction() {
		$this->view->assign('plan', $this->provider->readPlan());
	}

	/**
	 * @throws t3lib_error_Exception
	 * @return Tx_Vertretungsplan_Provider_StandInProviderInterface
	 */
	protected function getProvider() {
		$providerName = $this->settings['provider'];
		if (!empty($providerName)) {
			$providerClassName = 'Tx_Vertretungsplan_Provider_'. $providerName . 'Provider';

			if (class_exists($providerClassName)) {
				$provider = t3lib_div::makeInstance($providerClassName);
			} else {
				throw new t3lib_error_Exception('Classname ' + $providerClassName + ' of Provider not found', 1369660886);
			}
		} else {
			throw new t3lib_error_Exception('No Provider configured in TypoScript', 1369645294);
		}
		return $provider;
	}

	/**
	 * Get directory where the plans are stored
	 *
	 * @return String
	 */
	protected function getStorageDirectory() {

		$storageDirectory = $this->settings['storageDirectory'];

		if (!empty($storageDirectory)) {
			return $storageDirectory;
		} else {
			throw new t3lib_error_Exception('No storageDirectory configured or directory ' . $storageDirectory . ' not existing', 1369663056);
		}

	}

}