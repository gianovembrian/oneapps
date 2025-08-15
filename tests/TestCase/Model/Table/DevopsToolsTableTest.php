<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DevopsToolsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DevopsToolsTable Test Case
 */
class DevopsToolsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DevopsToolsTable
     */
    protected $DevopsTools;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.DevopsTools',
        'app.DevopsToolUsages',
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
        $config = $this->getTableLocator()->exists('DevopsTools') ? [] : ['className' => DevopsToolsTable::class];
        $this->DevopsTools = $this->getTableLocator()->get('DevopsTools', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DevopsTools);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DevopsToolsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
