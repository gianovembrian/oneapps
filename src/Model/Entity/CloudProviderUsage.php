<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CloudProviderUsage Entity
 *
 * @property string $id
 * @property string $information_system_detail_id
 * @property string $cloud_provider_id
 * @property string|null $service_type
 * @property string|null $usage_notes
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\InformationSystemDetail $information_system_detail
 * @property \App\Model\Entity\CloudProvider $cloud_provider
 */
class CloudProviderUsage extends Entity
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
        'cloud_provider_id' => true,
        'service_type' => true,
        'usage_notes' => true,
        'created' => true,
        'modified' => true,
        'information_system_detail' => true,
        'cloud_provider' => true,
    ];
}
