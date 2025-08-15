<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FrameworkUsagesFixture
 */
class FrameworkUsagesFixture extends TestFixture
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
                'id' => 'cbe3429f-a959-4df6-956b-ac327a93dc3e',
                'information_system_detail_id' => 'e7fb19c8-ee96-4343-8a50-1921dac35ff9',
                'framework_id' => '0c2fa828-7f79-447d-a1ac-4c22f930c9db',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created_at' => 1754618327,
            ],
        ];
        parent::init();
    }
}
