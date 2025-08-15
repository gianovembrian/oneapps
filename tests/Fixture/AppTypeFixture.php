<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppTypeFixture
 */
class AppTypeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'app_type';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'b71473a1-d8ff-45a4-9dc0-4c050a7dfa3a',
                'name' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
