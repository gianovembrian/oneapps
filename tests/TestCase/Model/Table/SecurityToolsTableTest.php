<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SecurityToolsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SecurityToolsTable Test Case
 */
class SecurityToolsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SecurityToolsTable
     */
    protected $SecurityTools;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.SecurityTools',
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
        $config = $this->getTableLocator()->exists('SecurityTools') ? [] : ['className' => SecurityToolsTable::class];
        $this->SecurityTools = $this->getTableLocator()->get('SecurityTools', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SecurityTools);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SecurityToolsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
