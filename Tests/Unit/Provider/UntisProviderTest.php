<?php

namespace Ipf\Vertretungsplan\Tests\Unit\Provider;

/**
 * Tests for Untis Provider
 */

class UntisProviderTest extends \Tx_Phpunit_TestCase {

	/**
	 * @var \Ipf\Vertretungsplan\Provider\UntisProvider
	 */
	public $fixture;

	public function setUp() {
		$settings = array();
		$this->fixture = $this->getAccessibleMock('Ipf\\Vertretungsplan\\Provider\\UntisProvider', $settings);
	}

	/**
	 * @test
	 */
	public function currentWeekIsCorrectlyDetermined() {
		var_dump($this->fixture);
	}

}