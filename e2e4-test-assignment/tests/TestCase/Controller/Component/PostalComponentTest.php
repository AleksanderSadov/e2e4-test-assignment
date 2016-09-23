<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\PostalComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\PostalComponent Test Case
 */
class PostalComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\PostalComponent
     */
    public $Postal;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Postal = new PostalComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Postal);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
