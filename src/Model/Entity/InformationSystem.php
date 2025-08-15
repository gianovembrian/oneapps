<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InformationSystem Entity
 *
 * @property string $id
 * @property string $system_name
 * @property string|null $description
 * @property string $user_id
 * @property string $app_type_id
 * @property string|null $system_status
 * @property string|null $document_path
 * @property string|null $repo_url
 * @property bool|null $is_cicd_pipeline
 * @property \Cake\I18n\DateTime|null $created_at
 * @property \Cake\I18n\DateTime|null $updated_at
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\AppType $app_type
 * @property \App\Model\Entity\InformationSystemDetail[] $information_system_details
 */
class InformationSystem extends Entity
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
        'system_name' => true,
        'description' => true,
        'user_id' => true,
        'app_type_id' => true,
        'system_status' => true,
        'document_path' => true,
        'repo_url' => true,
        'is_cicd_pipeline' => true,
        'created_at' => true,
        'updated_at' => true,
        'user' => true,
        'app_type' => true,
        'information_system_details' => true,
    ];
}
