<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VPdlnFixture
 */
class VPdlnFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'v_pdln';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '9e9f74db-b2ba-4bc4-8531-85a3c592fe91',
                'id_pegawai' => 1,
                'country_id' => '53826dc7-ff81-4ee8-ab7c-536c4b7d1fb5',
                'kegiatan' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'tempat_kegiatan' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'penyelenggara' => 'Lorem ipsum dolor sit amet',
                'waktu_mulai_kegiatan' => '2024-09-26',
                'waktu_selesai_kegiatan' => '2024-09-26',
                'tanggal_berangkat' => '2024-09-26',
                'tanggal_pulang' => '2024-09-26',
                'sumber_biaya' => 'Lorem ipsum dolor sit amet',
                'informasi_lain' => 'Lorem ipsum dolor sit amet',
                'surat_usulan_setneg' => 'Lorem ipsum dolor sit amet',
                'surat_biaya_setneg' => 'Lorem ipsum dolor sit amet',
                'kak_setneg' => 'Lorem ipsum dolor sit amet',
                'cv_setneg' => 'Lorem ipsum dolor sit amet',
                'surat_persetujuan_setneg' => 'Lorem ipsum dolor sit amet',
                'surat_undangan_setneg' => 'Lorem ipsum dolor sit amet',
                'jadwal_kegiatan_setneg' => 'Lorem ipsum dolor sit amet',
                'sk_pns_setneg' => 'Lorem ipsum dolor sit amet',
                'ktp_setneg' => 'Lorem ipsum dolor sit amet',
                'daftar_riwayat_setneg' => 'Lorem ipsum dolor sit amet',
                'usulan_kk_setneg' => 'Lorem ipsum dolor sit amet',
                'surat_usulan_itb' => 'Lorem ipsum dolor sit amet',
                'surat_undangan_itb' => 'Lorem ipsum dolor sit amet',
                'surat_biaya_itb' => 'Lorem ipsum dolor sit amet',
                'jadwal_kegiatan_itb' => 'Lorem ipsum dolor sit amet',
                'kak_itb' => 'Lorem ipsum dolor sit amet',
                'surat_persetujuan_itb' => 'Lorem ipsum dolor sit amet',
                'usulan_kk_itb' => 'Lorem ipsum dolor sit amet',
                'nama_lengkap' => 'Lorem ipsum dolor sit amet',
                'nip' => 'Lorem ipsum dolor sit amet',
                'nama_unit_kerja' => 'Lorem ipsum dolor sit amet',
                'jenis_penugasan' => 'Lorem ipsum dolor sit amet',
                'jenis_pegawai' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1727357621,
                'jenis_pengajuan' => 'Lorem ip',
                'name' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
