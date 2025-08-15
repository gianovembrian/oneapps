<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProgrammingLanguagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProgrammingLanguagesTable Test Case
 */
class ProgrammingLanguagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProgrammingLanguagesTable
     */
    protected $ProgrammingLanguages;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ProgrammingLanguages',
        'app.Frameworks',
        'app.InformationSystemDetails',
        'app.ProgrammingLanguageUsages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProgrammingLanguages') ? [] : ['className' => ProgrammingLanguagesTable::class];
        $this->ProgrammingLanguages = $this->getTableLocator()->get('ProgrammingLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProgrammingLanguages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProgrammingLanguagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProgrammingLanguagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
