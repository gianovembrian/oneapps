<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrameworksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrameworksTable Test Case
 */
class FrameworksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FrameworksTable
     */
    protected $Frameworks;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Frameworks',
        'app.ProgrammingLanguages',
        'app.FrameworkUsages',
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
        $config = $this->getTableLocator()->exists('Frameworks') ? [] : ['className' => FrameworksTable::class];
        $this->Frameworks = $this->getTableLocator()->get('Frameworks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Frameworks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FrameworksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FrameworksTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
