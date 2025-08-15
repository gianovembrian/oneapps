<?php
declare(strict_types=1);

namespace App\Test\TestCase\Form;

use App\Form\TestForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\TestForm Test Case
 */
class TestFormTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Form\TestForm
     */
    protected $Test;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->Test = new TestForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Test);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Form\TestForm::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
