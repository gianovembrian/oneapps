<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DbmsUsagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DbmsUsagesTable Test Case
 */
class DbmsUsagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DbmsUsagesTable
     */
    protected $DbmsUsages;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.DbmsUsages',
        'app.InformationSystemDetails',
        'app.Dbms',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DbmsUsages') ? [] : ['className' => DbmsUsagesTable::class];
        $this->DbmsUsages = $this->getTableLocator()->get('DbmsUsages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DbmsUsages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DbmsUsagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DbmsUsagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
