<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PdlnUserFixture
 */
class PdlnUserFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'pdln_user';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pdln_id' => 'Lorem ipsum dolor sit amet',
                'id_pegawai' => 1,
                'nama_lengkap' => 'Lorem ipsum dolor sit amet',
                'jenis_pegawai' => 'Lorem ipsum dolor sit amet',
                'jenis_penugasan' => 'Lorem ipsum dolor sit amet',
                'nama_unit_kerja' => 'Lorem ipsum dolor sit amet',
                'nama_unit_kerja_penempatan' => 'Lorem ipsum dolor sit amet',
                'nidn' => 'Lorem ipsum dolor sit amet',
                'nip' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'status_pegawai' => 'Lorem ipsum dolor sit amet',
                'id' => '67dc3308-b6af-46bd-b3be-46327eb1f362',
                'gelar_depan' => 'Lorem ipsum dolor sit amet',
                'gelar_belakang' => 'Lorem ipsum dolor sit amet',
                'golongan' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
