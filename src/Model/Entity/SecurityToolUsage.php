<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SecurityToolUsage Entity
 *
 * @property string $id
 * @property string $information_system_id
 * @property string $security_tool_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\InformationSystem $information_system
 * @property \App\Model\Entity\SecurityTool $security_tool
 */
class SecurityToolUsage extends Entity
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
        'information_system_id' => true,
        'security_tool_id' => true,
        'created' => true,
        'modified' => true,
        'information_system' => true,
        'security_tool' => true,
    ];
}
