<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppTypeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppTypeTable Test Case
 */
class AppTypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AppTypeTable
     */
    protected $AppType;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.AppType',
        'app.ListSisfo',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AppType') ? [] : ['className' => AppTypeTable::class];
        $this->AppType = $this->getTableLocator()->get('AppType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AppType);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AppTypeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
