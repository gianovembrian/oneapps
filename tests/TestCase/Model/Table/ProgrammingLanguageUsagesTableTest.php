<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProgrammingLanguageUsagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProgrammingLanguageUsagesTable Test Case
 */
class ProgrammingLanguageUsagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProgrammingLanguageUsagesTable
     */
    protected $ProgrammingLanguageUsages;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ProgrammingLanguageUsages',
        'app.InformationSystemDetails',
        'app.ProgrammingLanguages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProgrammingLanguageUsages') ? [] : ['className' => ProgrammingLanguageUsagesTable::class];
        $this->ProgrammingLanguageUsages = $this->getTableLocator()->get('ProgrammingLanguageUsages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProgrammingLanguageUsages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProgrammingLanguageUsagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProgrammingLanguageUsagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
