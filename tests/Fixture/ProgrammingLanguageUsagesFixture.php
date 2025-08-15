<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProgrammingLanguageUsagesFixture
 */
class ProgrammingLanguageUsagesFixture extends TestFixture
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
                'id' => 'aaef72b7-263a-45c0-aec0-fe26933ea427',
                'information_system_detail_id' => '4bd1adf9-6456-44ce-8da6-ed3dd83907a1',
                'programming_language_id' => '47a39f2c-51d8-4c31-a535-eaf2f0b243fa',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created_at' => 1754618331,
            ],
        ];
        parent::init();
    }
}
