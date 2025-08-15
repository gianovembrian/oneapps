<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PdlnTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PdlnTable Test Case
 */
class PdlnTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PdlnTable
     */
    protected $Pdln;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Pdln',
        'app.Countries',
        'app.Users',
        'app.PdlnUser',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pdln') ? [] : ['className' => PdlnTable::class];
        $this->Pdln = $this->getTableLocator()->get('Pdln', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Pdln);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PdlnTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PdlnTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
