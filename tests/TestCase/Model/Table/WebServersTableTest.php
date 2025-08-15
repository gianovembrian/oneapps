<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WebServersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WebServersTable Test Case
 */
class WebServersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WebServersTable
     */
    protected $WebServers;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.WebServers',
        'app.InformationSystemDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('WebServers') ? [] : ['className' => WebServersTable::class];
        $this->WebServers = $this->getTableLocator()->get('WebServers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->WebServers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\WebServersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
