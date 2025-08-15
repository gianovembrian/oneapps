<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UnitKerjaFixture
 */
class UnitKerjaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'unit_kerja';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'd9e7258c-1c5e-49e5-9b81-70d7bdae5595',
                'name' => 'Lorem ipsum dolor sit amet',
                'code' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
