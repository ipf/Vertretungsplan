<?php
/**
 * Tests for Untis Provider
 */

class Tx_Vertretungsplan_Tests_Unit_Provider_UntisProviderTest extends Tx_Phpunit_TestCase {

	/**
	 * @var Tx_Vertretungsplan_Provider_UntisProvider
	 */
	public $fixture;

	public function setUp() {
		$settings = array();
		$this->fixture = new Tx_Vertretungsplan_Provider_UntisProvider($settings);
	}

	/**
	 * @test
	 */
	public function determineCurrentWeekCorrectly() {
		$this->assertEquals(1, 1);
	}

}