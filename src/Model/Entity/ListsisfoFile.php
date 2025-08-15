<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ListsisfoFile Entity
 *
 * @property string $id
 * @property string $list_sisfo_id
 * @property string $file_name
 * @property string $file_path
 * @property int $file_size
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\ListSisfo $list_sisfo
 */
class ListsisfoFile extends Entity
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
        'list_sisfo_id' => true,
        'file_name' => true,
        'file_path' => true,
        'file_size' => true,
        'created' => true,
        'modified' => true,
        'list_sisfo' => true,
    ];
}
