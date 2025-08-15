<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CloudProvidersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CloudProvidersTable Test Case
 */
class CloudProvidersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CloudProvidersTable
     */
    protected $CloudProviders;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.CloudProviders',
        'app.CloudProviderUsages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CloudProviders') ? [] : ['className' => CloudProvidersTable::class];
        $this->CloudProviders = $this->getTableLocator()->get('CloudProviders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CloudProviders);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CloudProvidersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
