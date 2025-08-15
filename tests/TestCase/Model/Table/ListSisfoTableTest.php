<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ListSisfoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ListSisfoTable Test Case
 */
class ListSisfoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ListSisfoTable
     */
    protected $ListSisfo;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ListSisfo',
        'app.Users',
        'app.AppType',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ListSisfo') ? [] : ['className' => ListSisfoTable::class];
        $this->ListSisfo = $this->getTableLocator()->get('ListSisfo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ListSisfo);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ListSisfoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ListSisfoTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
