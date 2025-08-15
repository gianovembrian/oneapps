<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DevopsTool Entity
 *
 * @property string $id
 * @property string $name
 * @property string|null $category
 * @property string|null $description
 *
 * @property \App\Model\Entity\DevopsToolUsage[] $devops_tool_usages
 * @property \App\Model\Entity\InformationSystemDetail[] $information_system_details
 */
class DevopsTool extends Entity
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
        'category' => true,
        'description' => true,
        'devops_tool_usages' => true,
        'information_system_details' => true,
    ];
}
