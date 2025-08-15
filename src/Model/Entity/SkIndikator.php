<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SkIndikator Entity
 *
 * @property string $id
 * @property string|null $nip
 * @property string|null $nama
 * @property string|null $posisi
 * @property int|null $kode_indikator
 * @property int|null $tahun
 * @property int|null $jumlah_sk
 * @property string|null $status
 * @property string|null $jenis_penugasan
 */
class SkIndikator extends Entity
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
        'nip' => true,
        'nama' => true,
        'posisi' => true,
        'kode_indikator' => true,
        'tahun' => true,
        'jumlah_sk' => true,
        'status' => true,
        'jenis_penugasan' => true,
    ];
}
