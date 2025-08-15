<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InformationSystemDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InformationSystemDetailsTable Test Case
 */
class InformationSystemDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InformationSystemDetailsTable
     */
    protected $InformationSystemDetails;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.InformationSystemDetails',
        'app.InformationSystems',
        'app.ProgrammingLanguages',
        'app.Dbms',
        'app.AppType',
        'app.ContainerTechnologies',
        'app.DevopsTools',
        'app.Frameworks',
        'app.SecurityTools',
        'app.WebServers',
        'app.UnitKerja',
        'app.CloudProviderUsages',
        'app.ContainerUsages',
        'app.DbmsUsages',
        'app.DevopsToolUsages',
        'app.FrameworkUsages',
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
        $config = $this->getTableLocator()->exists('InformationSystemDetails') ? [] : ['className' => InformationSystemDetailsTable::class];
        $this->InformationSystemDetails = $this->getTableLocator()->get('InformationSystemDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->InformationSystemDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InformationSystemDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\InformationSystemDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
