<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TubelUser Entity
 *
 * @property string|null $pdln_id
 * @property int|null $id_pegawai
 * @property string|null $nama_lengkap
 * @property string|null $jenis_pegawai
 * @property string|null $jenis_penugasan
 * @property string|null $nama_unit_kerja
 * @property string|null $nama_unit_kerja_penempatan
 * @property string|null $nidn
 * @property string|null $nip
 * @property string|null $status
 * @property string|null $status_pegawai
 * @property string $id
 * @property string|null $gelar_depan
 * @property string|null $gelar_belakang
 * @property string|null $golongan
 */
class TubelUser extends Entity
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
        'pdln_id' => true,
        'id_pegawai' => true,
        'nama_lengkap' => true,
        'jenis_pegawai' => true,
        'jenis_penugasan' => true,
        'nama_unit_kerja' => true,
        'nama_unit_kerja_penempatan' => true,
        'nidn' => true,
        'nip' => true,
        'status' => true,
        'status_pegawai' => true,
        'gelar_depan' => true,
        'gelar_belakang' => true,
        'golongan' => true,
    ];
}
