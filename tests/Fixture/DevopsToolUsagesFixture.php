<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DevopsToolUsagesFixture
 */
class DevopsToolUsagesFixture extends TestFixture
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
                'id' => '47644134-6e0a-4807-96f5-c7ee84641f34',
                'information_system_detail_id' => 'c5337162-9281-4eb8-a2e9-47cf41923c20',
                'devops_tool_id' => '497d0ffb-b687-4fb1-a211-92cfae9e1f50',
                'usage_notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => 1754618298,
                'modified' => 1754618298,
            ],
        ];
        parent::init();
    }
}
