<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DevopsToolUsagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DevopsToolUsagesTable Test Case
 */
class DevopsToolUsagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DevopsToolUsagesTable
     */
    protected $DevopsToolUsages;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.DevopsToolUsages',
        'app.InformationSystemDetails',
        'app.DevopsTools',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DevopsToolUsages') ? [] : ['className' => DevopsToolUsagesTable::class];
        $this->DevopsToolUsages = $this->getTableLocator()->get('DevopsToolUsages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DevopsToolUsages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DevopsToolUsagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DevopsToolUsagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
