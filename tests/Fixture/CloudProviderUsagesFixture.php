<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CloudProviderUsagesFixture
 */
class CloudProviderUsagesFixture extends TestFixture
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
                'id' => 'dac9f1dd-3c18-4eae-9222-b979300594f7',
                'information_system_detail_id' => 'f3bc7d19-5d74-4c66-be84-1b1683c864e9',
                'cloud_provider_id' => '6c945bd8-de8c-4ada-89d8-fe83cb0bfd2a',
                'service_type' => 'Lorem ipsum dolor sit amet',
                'usage_notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => 1754618316,
                'modified' => 1754618316,
            ],
        ];
        parent::init();
    }
}
