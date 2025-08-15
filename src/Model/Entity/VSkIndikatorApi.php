<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VSkIndikatorApi Entity
 *
 * @property string|null $nip
 * @property string|null $indikator_kinerja
 * @property int|null $bulan
 * @property string|null $komponen_id
 * @property string|null $nama
 * @property string|null $posisi
 * @property int|null $sasaran_kinerja
 * @property int|null $tahun
 * @property int|null $komponen_score
 * @property \Cake\I18n\DateTime|null $last_update
 */
class VSkIndikatorApi extends Entity
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
        'indikator_kinerja' => true,
        'bulan' => true,
        'komponen_id' => true,
        'nama' => true,
        'posisi' => true,
        'sasaran_kinerja' => true,
        'tahun' => true,
        'komponen_score' => true,
        'last_update' => true,
    ];
}
