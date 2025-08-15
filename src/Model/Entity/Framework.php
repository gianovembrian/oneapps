<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Framework Entity
 *
 * @property string $id
 * @property string $name
 * @property string $programming_language_id
 *
 * @property \App\Model\Entity\ProgrammingLanguage $programming_language
 * @property \App\Model\Entity\FrameworkUsage[] $framework_usages
 * @property \App\Model\Entity\InformationSystemDetail[] $information_system_details
 */
class Framework extends Entity
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
        'programming_language_id' => true,
        'programming_language' => true,
        'framework_usages' => true,
        'information_system_details' => true,
    ];
}
