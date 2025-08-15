<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ListSisfoFixture
 */
class ListSisfoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'list_sisfo';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'b74daf60-a6df-4dea-8b70-7395b63ab041',
                'unit_kerja_id' => '8225d5b3-f2bd-4c3e-8802-feb96cfc88b5',
                'user_id' => 'a49bcc15-0b21-44b3-979c-d2cf0c54e842',
                'app_type_id' => '26f743a3-7db9-402e-8cab-2f4e6610d3a4',
                'dev_status' => 'Lorem ipsum do',
                'ip_address' => 'Lorem ipsum dolor sit amet',
                'program_lang' => 'Lorem ipsum dolor sit amet',
                'framework' => 'Lorem ipsum dolor sit amet',
                'dbms' => 'Lorem ipsum dolor sit amet',
                'developer' => 'Lorem ipsum dolor sit amet',
                'pic' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'is_active' => 1,
                'program_lang_ver' => 'Lorem ipsum dolor sit amet',
                'system_name' => 'Lorem ipsum dolor sit amet',
                'domain' => 'Lorem ipsum dolor sit amet',
                'other_program_lang' => 'Lorem ipsum dolor sit amet',
                'other_dbms' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
