<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SecurityToolUsagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SecurityToolUsagesTable Test Case
 */
class SecurityToolUsagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SecurityToolUsagesTable
     */
    protected $SecurityToolUsages;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.SecurityToolUsages',
        'app.InformationSystems',
        'app.SecurityTools',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SecurityToolUsages') ? [] : ['className' => SecurityToolUsagesTable::class];
        $this->SecurityToolUsages = $this->getTableLocator()->get('SecurityToolUsages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SecurityToolUsages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SecurityToolUsagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SecurityToolUsagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
