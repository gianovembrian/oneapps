<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContainerUsagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContainerUsagesTable Test Case
 */
class ContainerUsagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContainerUsagesTable
     */
    protected $ContainerUsages;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ContainerUsages',
        'app.InformationSystemDetails',
        'app.ContainerTechnologies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ContainerUsages') ? [] : ['className' => ContainerUsagesTable::class];
        $this->ContainerUsages = $this->getTableLocator()->get('ContainerUsages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ContainerUsages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ContainerUsagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ContainerUsagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
