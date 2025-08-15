<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DbmsUsage Entity
 *
 * @property string $id
 * @property string $information_system_detail_id
 * @property string $dbms_id
 * @property string|null $version
 * @property string|null $description
 * @property \Cake\I18n\DateTime|null $created_at
 *
 * @property \App\Model\Entity\InformationSystemDetail $information_system_detail
 * @property \App\Model\Entity\Dbm $dbm
 */
class DbmsUsage extends Entity
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
        'information_system_detail_id' => true,
        'dbms_id' => true,
        'version' => true,
        'description' => true,
        'created_at' => true,
        'information_system_detail' => true,
        'dbm' => true,
    ];
}
