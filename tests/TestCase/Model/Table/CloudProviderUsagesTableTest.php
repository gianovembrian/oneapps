<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CloudProviderUsagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CloudProviderUsagesTable Test Case
 */
class CloudProviderUsagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CloudProviderUsagesTable
     */
    protected $CloudProviderUsages;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.CloudProviderUsages',
        'app.InformationSystemDetails',
        'app.CloudProviders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CloudProviderUsages') ? [] : ['className' => CloudProviderUsagesTable::class];
        $this->CloudProviderUsages = $this->getTableLocator()->get('CloudProviderUsages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CloudProviderUsages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CloudProviderUsagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CloudProviderUsagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
