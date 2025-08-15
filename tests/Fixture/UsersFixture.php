<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'id' => '213501df-3066-400d-a423-44b10c5ba096',
                'name' => 'Lorem ipsum dolor sit amet',
                'id_pegawai' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'unit_kerja_id' => '72b10e58-a302-4617-bed9-7669a297cd6c',
                'role_id' => '656e69c9-826d-4c1f-85d8-98b09e667a93',
                'password' => 'Lorem ipsum dolor sit amet',
                'nip' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
