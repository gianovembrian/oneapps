<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TubelUserTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TubelUserTable Test Case
 */
class TubelUserTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TubelUserTable
     */
    protected $TubelUser;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.TubelUser',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TubelUser') ? [] : ['className' => TubelUserTable::class];
        $this->TubelUser = $this->getTableLocator()->get('TubelUser', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TubelUser);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TubelUserTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
