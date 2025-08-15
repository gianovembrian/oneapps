<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UnitKerja Entity
 *
 * @property string $id
 * @property string|null $name
 * @property string|null $code
 *
 * @property \App\Model\Entity\ListSisfo[] $list_sisfo
 * @property \App\Model\Entity\User[] $users
 */
class UnitKerja extends Entity
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
        'name' => true,
        'code' => true,
        'list_sisfo' => true,
        'users' => true,
    ];
}
