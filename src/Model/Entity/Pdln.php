<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pdln Entity
 *
 * @property string $id
 * @property int|null $id_pegawai
 * @property string|null $country_id
 * @property string|null $kegiatan
 * @property string|null $tempat_kegiatan
 * @property string|null $penyelenggara
 * @property \Cake\I18n\Date|null $waktu_mulai_kegiatan
 * @property \Cake\I18n\Date|null $waktu_selesai_kegiatan
 * @property \Cake\I18n\Date|null $tanggal_berangkat
 * @property \Cake\I18n\Date|null $tanggal_pulang
 * @property string|null $sumber_biaya
 * @property string|null $informasi_lain
 * @property string|null $surat_usulan_setneg
 * @property string|null $surat_biaya_setneg
 * @property string|null $kak_setneg
 * @property string|null $cv_setneg
 * @property string|null $surat_persetujuan_setneg
 * @property string|null $surat_undangan_setneg
 * @property string|null $jadwal_kegiatan_setneg
 * @property string|null $sk_pns_setneg
 * @property string|null $ktp_setneg
 * @property string|null $daftar_riwayat_setneg
 * @property string|null $usulan_kk_setneg
 * @property string|null $surat_usulan_itb
 * @property string|null $surat_undangan_itb
 * @property string|null $surat_biaya_itb
 * @property string|null $jadwal_kegiatan_itb
 * @property string|null $kak_itb
 * @property string|null $surat_persetujuan_itb
 * @property string|null $usulan_kk_itb
 * @property string|null $nama_lengkap
 * @property string|null $nip
 * @property string|null $nama_unit_kerja
 * @property string|null $jenis_penugasan
 * @property string|null $jenis_pegawai
 * @property \Cake\I18n\DateTime|null $created
 * @property string|null $jenis_pengajuan
 * @property string|null $urgensi
 * @property string|null $approval_status
 * @property string|null $approval_notes
 * @property int|null $is_new
 * @property \Cake\I18n\Date|null $modified
 * @property string|null $user_id
 * @property \Cake\I18n\DateTime|null $approval_date
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\PdlnUser[] $pdln_user
 */
class Pdln extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'id_pegawai' => true,
        'country_id' => true,
        'kegiatan' => true,
        'tempat_kegiatan' => true,
        'penyelenggara' => true,
        'waktu_mulai_kegiatan' => true,
        'waktu_selesai_kegiatan' => true,
        'tanggal_berangkat' => true,
        'tanggal_pulang' => true,
        'sumber_biaya' => true,
        'informasi_lain' => true,
        'surat_usulan_setneg' => true,
        'surat_biaya_setneg' => true,
        'kak_setneg' => true,
        'cv_setneg' => true,
        'surat_persetujuan_setneg' => true,
        'surat_undangan_setneg' => true,
        'jadwal_kegiatan_setneg' => true,
        'sk_pns_setneg' => true,
        'ktp_setneg' => true,
        'daftar_riwayat_setneg' => true,
        'usulan_kk_setneg' => true,
        'surat_usulan_itb' => true,
        'surat_undangan_itb' => true,
        'surat_biaya_itb' => true,
        'jadwal_kegiatan_itb' => true,
        'kak_itb' => true,
        'surat_persetujuan_itb' => true,
        'usulan_kk_itb' => true,
        'nama_lengkap' => true,
        'nip' => true,
        'nama_unit_kerja' => true,
        'jenis_penugasan' => true,
        'jenis_pegawai' => true,
        'created' => true,
        'jenis_pengajuan' => true,
        'urgensi' => true,
        'approval_status' => true,
        'approval_notes' => true,
        'is_new' => true,
        'modified' => true,
        'user_id' => true,
        'approval_date' => true,
        'country' => true,
        'user' => true,
        'pdln_user' => true,
    ];
}
