<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InformationSystemDetail Entity
 *
 * @property string $id
 * @property string $information_system_id
 * @property string|null $system_type
 * @property string|null $dev_status
 * @property string|null $ip_address
 * @property string|null $other_program_lang
 * @property string|null $dbms_id
 * @property string|null $dbms_ver
 * @property string|null $other_dbms
 * @property string|null $app_type_id
 * @property string|null $container_tech_id
 * @property string|null $devops_tool_id
 * @property string|null $framework_id
 * @property string|null $security_tool_id
 * @property string|null $web_server_id
 * @property string|null $developer
 * @property string|null $pic
 * @property string|null $description
 * @property bool|null $is_active
 * @property string|null $system_name
 * @property string|null $domain
 * @property string $unit_kerja_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $backend_programming_language_id
 * @property string|null $frontend_programming_language_id
 * @property string|null $backend_program_lang_ver
 * @property string|null $frontend_program_lang_ver
 *
 * @property \App\Model\Entity\InformationSystem $information_system
 * @property \App\Model\Entity\ProgrammingLanguage $programming_language
 * @property \App\Model\Entity\Dbm $dbm
 * @property \App\Model\Entity\AppType $app_type
 * @property \App\Model\Entity\ContainerTechnology $container_technology
 * @property \App\Model\Entity\DevopsTool $devops_tool
 * @property \App\Model\Entity\Framework $framework
 * @property \App\Model\Entity\SecurityTool $security_tool
 * @property \App\Model\Entity\WebServer $web_server
 * @property \App\Model\Entity\UnitKerja $unit_kerja
 * @property \App\Model\Entity\CloudProviderUsage[] $cloud_provider_usages
 * @property \App\Model\Entity\ContainerUsage[] $container_usages
 * @property \App\Model\Entity\DbmsUsage[] $dbms_usages
 * @property \App\Model\Entity\DevopsToolUsage[] $devops_tool_usages
 * @property \App\Model\Entity\FrameworkUsage[] $framework_usages
 * @property \App\Model\Entity\ProgrammingLanguageUsage[] $programming_language_usages
 */
class InformationSystemDetail extends Entity
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
        'system_type' => true,
        'dev_status' => true,
        'ip_address' => true,
        'other_program_lang' => true,
        'dbms_id' => true,
        'dbms_ver' => true,
        'other_dbms' => true,
        'app_type_id' => true,
        'container_tech_id' => true,
        'devops_tool_id' => true,
        'framework_id' => true,
        'security_tool_id' => true,
        'web_server_id' => true,
        'developer' => true,
        'pic' => true,
        'description' => true,
        'is_active' => true,
        'system_name' => true,
        'domain' => true,
        'unit_kerja_id' => true,
        'created' => true,
        'modified' => true,
        'backend_programming_language_id' => true,
        'frontend_programming_language_id' => true,
        'backend_program_lang_ver' => true,
        'frontend_program_lang_ver' => true,
        'information_system' => true,
        'programming_language' => true,
        'dbm' => true,
        'app_type' => true,
        'container_technology' => true,
        'devops_tool' => true,
        'framework' => true,
        'security_tool' => true,
        'web_server' => true,
        'unit_kerja' => true,
        'cloud_provider_usages' => true,
        'container_usages' => true,
        'dbms_usages' => true,
        'devops_tool_usages' => true,
        'framework_usages' => true,
        'programming_language_usages' => true,
    ];
}
