<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProgrammingLanguage Entity
 *
 * @property string $id
 * @property string $name
 *
 * @property \App\Model\Entity\Framework[] $frameworks
 * @property \App\Model\Entity\InformationSystemDetail[] $information_system_details
 * @property \App\Model\Entity\ProgrammingLanguageUsage[] $programming_language_usages
 */
class ProgrammingLanguage extends Entity
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
        'frameworks' => true,
        'information_system_details' => true,
        'programming_language_usages' => true,
    ];
}
