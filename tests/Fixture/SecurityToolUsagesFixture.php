<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SecurityToolUsagesFixture
 */
class SecurityToolUsagesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '3f450f73-aed4-4c44-9926-41a61cd09085',
                'information_system_id' => '35d76f68-e5cf-402a-9024-4318e5fcaeb3',
                'security_tool_id' => '396bddc0-70f2-425e-830f-711382456055',
                'created' => 1754624668,
                'modified' => 1754624668,
            ],
        ];
        parent::init();
    }
}
