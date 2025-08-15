<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PdlnFixture
 */
class PdlnFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'pdln';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'a4a69d3a-f184-4df4-a0af-43b19d48533e',
                'id_pegawai' => 1,
                'country_id' => '6e1c384e-74d9-4229-b81f-76c30d0ea3e6',
                'kegiatan' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'tempat_kegiatan' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'penyelenggara' => 'Lorem ipsum dolor sit amet',
                'waktu_mulai_kegiatan' => '2024-10-30',
                'waktu_selesai_kegiatan' => '2024-10-30',
                'tanggal_berangkat' => '2024-10-30',
                'tanggal_pulang' => '2024-10-30',
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
                'created' => 1730255895,
                'jenis_pengajuan' => 'Lorem ip',
                'urgensi' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'approval_status' => 'Lorem ipsum dolor sit amet',
                'approval_notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'is_new' => 1,
                'modified' => '2024-10-30',
                'user_id' => 'fcd38dc9-962a-4e49-a997-27191a2c0cd9',
                'approval_date' => 1730255895,
            ],
        ];
        parent::init();
    }
}
