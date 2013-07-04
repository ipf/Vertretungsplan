<?php

namespace Ipf\Vertretungsplan\Controller;

/**
 * Controller
 */

class StandInController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \Ipf\Vertretungsplan\Provider\StandInProviderInterface
	 */
	protected $provider;

	/**
	 * @var String
	 */
	protected $providerName;

	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;

	/**
	 * @var \TYPO3\CMS\Core\Cache\Frontend\AbstractFrontend
	 */
	protected $cacheInstance;

	/**
	 * @var \TYPO3\CMS\Core\Page\PageRenderer
	 */
	protected $pageRenderer;

	/**
	 * Initializes defaults
	 */
	public function initializeAction() {
		$this->provider = $this->getProvider();

		$this->addJavaScriptToHead();

		$this->pageRenderer = $pageRenderer = $GLOBALS['TSFE']->getPageRenderer();

		$this->provider->setLocation($this->getStorageLocation());
		\TYPO3\CMS\Core\Cache\Cache::initializeCachingFramework();

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
	 * @throws \TYPO3\CMS\Core\Error\Exception
	 * @return \Ipf\Vertretungsplan\Provider\StandInProviderInterface
	 */
	protected function getProvider() {
		$providerName = $this->settings['provider'];

		$providerSettings = $this->getProviderSettings($providerName);

		if (!empty($providerName)) {
			$providerClassName = 'Ipf\Vertretungsplan\Provider\\'. $providerName . 'Provider';
			$this->providerName = $providerName;
			if (class_exists($providerClassName)) {
				$provider = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance($providerClassName, $providerSettings);
			} else {
				throw new \TYPO3\CMS\Core\Error\Exception('Classname ' + $providerClassName + ' of Provider not found', 1369660886);
			}
		} else {
			throw new \TYPO3\CMS\Core\Error\Exception('No Provider configured in TypoScript', 1369645294);
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
			$providerSettings = \TYPO3\CMS\Core\Utility\GeneralUtility::array_merge_recursive_overrule($providerSettings, array('storageLocation' => $this->settings['storageLocation']));
			return $providerSettings;
		} else {
			return Array();
		}
	}

	/**
	 * Get directory where the plans are stored
	 *
	 * @throws \TYPO3\CMS\Core\Error\ErrorException
	 * @return String
	 */
	protected function getStorageLocation() {

		$storageLocation = $this->settings['storageLocation'];

		if (!empty($storageLocation)) {
			$location = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($storageLocation);
			if (is_dir($location)) {
				return $location;
			} else {
				throw new \TYPO3\CMS\Core\Error\ErrorException('The configured location ' . $location . ' does not exist', 1369665059);
			}
		} else {
			throw new \TYPO3\CMS\Core\Error\ErrorException('No storageLocation configured', 1369663056);
		}

	}

	/**
	 * Adds JavaScript to the page
	 *
	 * @return void
	 */
	protected function addJavaScriptToHead() {

		$fileName = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath('vertretungsplan') . 'Resources/Public/JavaScript/Provider/' . $this->providerName . '/Vertretungsplan.js';

		if (file_exists($fileName)) {
			$this->pageRenderer->addJsFooterFile($fileName);
		}

	}

}