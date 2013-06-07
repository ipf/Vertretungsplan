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
	 * @inject
	 */
	protected $configurationManager;

	/**
	 * @var t3lib_cache_frontend_AbstractFrontend
	 */
	protected $cacheInstance;

	/**
	 * Initializes defaults
	 */
	public function initializeAction() {
		$this->provider = $this->getProvider();

		$this->provider->setLocation($this->getStorageLocation());
		t3lib_cache::initializeCachingFramework();

		$this->cacheInstance = $GLOBALS['typo3CacheManager']->getCache('vertretungsplan_plancache');
	}

	/**
	 * Read the plan from the provider and pass it to the view
	 */
	public function indexAction() {
		$planHash = sha1(file_get_contents($this->provider->getLocation()));

		if ($this->cacheInstance->has($planHash)) {
			$plan = $this->cacheInstance->get($planHash);
		} else {
			$plan = $this->provider->readPlan();
			$this->cacheInstance->set($planHash, $plan);
		}

		$this->view->assign('plan', $plan);
	}

	/**
	 * @throws t3lib_error_Exception
	 * @return Tx_Vertretungsplan_Provider_StandInProviderInterface
	 */
	protected function getProvider() {
		$providerName = $this->settings['provider'];

		$providerSettings = $this->getProviderSettings($providerName);

		if (!empty($providerName)) {
			$providerClassName = 'Tx_Vertretungsplan_Provider_'. $providerName . 'Provider';

			if (class_exists($providerClassName)) {
				$provider = t3lib_div::makeInstance($providerClassName, $providerSettings);
			} else {
				throw new t3lib_error_Exception('Classname ' + $providerClassName + ' of Provider not found', 1369660886);
			}
		} else {
			throw new t3lib_error_Exception('No Provider configured in TypoScript', 1369645294);
		}
		return $provider;
	}

	/**
	 * Get the settings from TypoScript if they exist
	 * else return an empty array
	 *
	 * @param $providerName
	 * @return array
	 */
	protected function getProviderSettings($providerName) {
		if (is_array($this->settings[$providerName])) {
			$providerSettings = $this->settings[$providerName];
			$providerSettings = t3lib_div::array_merge_recursive_overrule($providerSettings, array('storageLocation' => $this->settings['storageLocation']));
			return $providerSettings;
		} else {
			return Array();
		}
	}

	/**
	 * Get directory where the plans are stored
	 *
	 * @throws t3lib_error_Exception
	 * @return String
	 */
	protected function getStorageLocation() {

		$storageLocation = $this->settings['storageLocation'];

		if (!empty($storageLocation)) {
			$location = t3lib_div::getFileAbsFileName($storageLocation);
			if (is_dir($location)) {
				return $location;
			} else {
				throw new t3lib_error_Exception('The configured location ' . $location . ' does not exist', 1369665059);
			}
		} else {
			throw new t3lib_error_Exception('No storageLocation configured', 1369663056);
		}

	}

}