<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InformationSystemsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InformationSystemsTable Test Case
 */
class InformationSystemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InformationSystemsTable
     */
    protected $InformationSystems;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.InformationSystems',
        'app.Users',
        'app.AppType',
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
        $config = $this->getTableLocator()->exists('InformationSystems') ? [] : ['className' => InformationSystemsTable::class];
        $this->InformationSystems = $this->getTableLocator()->get('InformationSystems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->InformationSystems);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InformationSystemsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\InformationSystemsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
