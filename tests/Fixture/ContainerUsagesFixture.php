<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContainerUsagesFixture
 */
class ContainerUsagesFixture extends TestFixture
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
                'id' => '3e7a4eab-1f01-425a-b9f9-d7850a94679d',
                'information_system_detail_id' => 'c48eef4c-3542-4b72-a7e9-b821c690e106',
                'container_technology_id' => '8f743df1-7260-4426-8039-6264c3b20621',
                'usage_notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => 1754618319,
                'modified' => 1754618319,
            ],
        ];
        parent::init();
    }
}
