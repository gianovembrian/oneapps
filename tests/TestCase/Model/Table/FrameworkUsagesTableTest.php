<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrameworkUsagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrameworkUsagesTable Test Case
 */
class FrameworkUsagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FrameworkUsagesTable
     */
    protected $FrameworkUsages;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.FrameworkUsages',
        'app.InformationSystemDetails',
        'app.Frameworks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FrameworkUsages') ? [] : ['className' => FrameworkUsagesTable::class];
        $this->FrameworkUsages = $this->getTableLocator()->get('FrameworkUsages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FrameworkUsages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FrameworkUsagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FrameworkUsagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
