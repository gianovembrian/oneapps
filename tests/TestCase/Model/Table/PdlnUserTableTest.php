<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PdlnUserTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PdlnUserTable Test Case
 */
class PdlnUserTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PdlnUserTable
     */
    protected $PdlnUser;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
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
        $config = $this->getTableLocator()->exists('PdlnUser') ? [] : ['className' => PdlnUserTable::class];
        $this->PdlnUser = $this->getTableLocator()->get('PdlnUser', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PdlnUser);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PdlnUserTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
