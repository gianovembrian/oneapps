<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InformationSystemsFixture
 */
class InformationSystemsFixture extends TestFixture
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
                'id' => '70ed6697-604a-48f8-a4ed-9d2ad94eab70',
                'system_name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'user_id' => '2ae11b46-2ef5-4bfd-8c6c-ce76dd656015',
                'app_type_id' => '2d8c1e62-2a8f-4960-b836-0b2ff4e3fadf',
                'system_status' => 'Lorem ipsum dolor ',
                'document_path' => 'Lorem ipsum dolor sit amet',
                'repo_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'is_cicd_pipeline' => 1,
                'created_at' => 1754618372,
                'updated_at' => 1754618372,
            ],
        ];
        parent::init();
    }
}
