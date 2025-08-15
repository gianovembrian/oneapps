<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DbmsUsagesFixture
 */
class DbmsUsagesFixture extends TestFixture
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
                'id' => '3c197360-4b63-4e22-89cf-83bd4a65418d',
                'information_system_detail_id' => '7a09fb84-d74b-44ed-a0c7-304c35028c79',
                'dbms_id' => '9c2880f6-26c5-407a-a75b-f2595b4d0578',
                'version' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created_at' => 1754618323,
            ],
        ];
        parent::init();
    }
}
