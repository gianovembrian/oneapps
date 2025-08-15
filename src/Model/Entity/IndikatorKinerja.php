<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IndikatorKinerja Entity
 *
 * @property string $id
 * @property string|null $no_sk
 * @property string|null $judul_sk
 * @property \Cake\I18n\Date|null $tanggal_sk
 * @property string|null $unit_pengusul
 * @property string|null $nip
 * @property string|null $nama
 * @property string|null $posisi
 * @property int|null $kode_indikator
 * @property string|null $status_sk
 * @property string|null $jenis_penugasan
 */
class IndikatorKinerja extends Entity
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
        'no_sk' => true,
        'judul_sk' => true,
        'tanggal_sk' => true,
        'unit_pengusul' => true,
        'nip' => true,
        'nama' => true,
        'posisi' => true,
        'kode_indikator' => true,
        'status_sk' => true,
        'jenis_penugasan' => true,
    ];
}
