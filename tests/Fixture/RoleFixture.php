<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RoleFixture
 */
class RoleFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'role';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '7e29e661-d4c0-4ff9-990d-0ac406e1dd47',
                'name' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
