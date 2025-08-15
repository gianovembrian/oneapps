<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContainerTechnologiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContainerTechnologiesTable Test Case
 */
class ContainerTechnologiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContainerTechnologiesTable
     */
    protected $ContainerTechnologies;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ContainerTechnologies',
        'app.ContainerUsages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ContainerTechnologies') ? [] : ['className' => ContainerTechnologiesTable::class];
        $this->ContainerTechnologies = $this->getTableLocator()->get('ContainerTechnologies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ContainerTechnologies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ContainerTechnologiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
