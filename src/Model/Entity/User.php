<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property string $id
 * @property string|null $name
 * @property string|null $id_pegawai
 * @property string|null $email
 * @property string|null $unit_kerja_id
 * @property string|null $role_id
 * @property string|null $password
 * @property string|null $nip
 *
 * @property \App\Model\Entity\ListSisfo[] $list_sisfo
 * @property \App\Model\Entity\UnitKerja $unit_kerja
 * @property \App\Model\Entity\Role $role
 */
class User extends Entity
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
        'id_pegawai' => true,
        'email' => true,
        'unit_kerja_id' => true,
        'role_id' => true,
        'password' => true,
        'nip' => true,
        'list_sisfo' => true,
        'unit_kerja' => true,
        'role' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        return null;
    }
}
