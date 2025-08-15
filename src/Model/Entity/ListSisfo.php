<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ListSisfo Entity
 *
 * @property string $id
 * @property string|null $unit_kerja_id
 * @property string|null $user_id
 * @property string|null $app_type_id
 * @property string|null $dev_status
 * @property string|null $ip_address
 * @property string|null $program_lang
 * @property string|null $framework
 * @property string|null $dbms
 * @property string|null $developer
 * @property string|null $pic
 * @property string|null $description
 * @property int|null $is_active
 * @property string|null $program_lang_ver
 * @property string|null $system_name
 * @property string|null $domain
 * @property string|null $other_program_lang
 * @property string|null $other_dbms
 * @property string|null $dbms_ver
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\AppType $app_type
 * @property \App\Model\Entity\UnitKerja $unit_kerja
 */
class ListSisfo extends Entity
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
         '*' => true, 
    ];
}
