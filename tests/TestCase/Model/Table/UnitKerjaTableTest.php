<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UnitKerjaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UnitKerjaTable Test Case
 */
class UnitKerjaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UnitKerjaTable
     */
    protected $UnitKerja;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.UnitKerja',
        'app.ListSisfo',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UnitKerja') ? [] : ['className' => UnitKerjaTable::class];
        $this->UnitKerja = $this->getTableLocator()->get('UnitKerja', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UnitKerja);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UnitKerjaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
