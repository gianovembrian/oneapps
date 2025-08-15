<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InformationSystemDetailsFixture
 */
class InformationSystemDetailsFixture extends TestFixture
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
                'id' => 'c194d29a-5d36-448c-ab39-5fcff7e26949',
                'information_system_id' => 'abbc48e8-71ac-4a29-9976-ce69ed2f40ee',
                'system_type' => 'Lorem ipsum dolor sit amet',
                'dev_status' => 'Lorem ipsum dolor sit amet',
                'ip_address' => 'Lorem ipsum dolor sit amet',
                'other_program_lang' => 'Lorem ipsum dolor sit amet',
                'dbms_id' => '698cac8c-a405-442f-af33-1033421a9d37',
                'dbms_ver' => 'Lorem ipsum dolor sit amet',
                'other_dbms' => 'Lorem ipsum dolor sit amet',
                'app_type_id' => '78f4cb9e-44fc-46bc-9a6b-e0ed3cc953f4',
                'container_tech_id' => '9f71f9c4-2c42-4302-9062-eefdafb6cd3f',
                'devops_tool_id' => 'b09c2754-09db-4ec9-8af0-5c92953e82a9',
                'framework_id' => '83db8251-97ee-4f59-a0e1-03b991cff09e',
                'security_tool_id' => '440b614f-feca-424a-930c-533e28eea12f',
                'web_server_id' => '6cad1097-db19-4b46-8a8c-3ee2e126f235',
                'developer' => 'Lorem ipsum dolor sit amet',
                'pic' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'is_active' => 1,
                'system_name' => 'Lorem ipsum dolor sit amet',
                'domain' => 'Lorem ipsum dolor sit amet',
                'unit_kerja_id' => 'bd2c3203-b096-484a-9818-23c0e5723642',
                'created' => 1754622169,
                'modified' => 1754622169,
                'backend_programming_language_id' => 'ea706b40-3a59-4820-a99e-e5458fdb4de1',
                'frontend_programming_language_id' => 'd109247f-3a7f-462b-a471-b419e002a134',
                'backend_program_lang_ver' => 'Lorem ipsum dolor sit amet',
                'frontend_program_lang_ver' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
