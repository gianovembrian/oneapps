<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InformationSystemDetails Model
 *
 * @property \App\Model\Table\InformationSystemsTable&\Cake\ORM\Association\BelongsTo $InformationSystems
 * @property \App\Model\Table\DbmsTable&\Cake\ORM\Association\BelongsTo $Dbms
 * @property \App\Model\Table\AppTypeTable&\Cake\ORM\Association\BelongsTo $AppType
 * @property \App\Model\Table\ContainerTechnologiesTable&\Cake\ORM\Association\BelongsTo $ContainerTechnologies
 * @property \App\Model\Table\DevopsToolsTable&\Cake\ORM\Association\BelongsTo $DevopsTools
 * @property \App\Model\Table\FrameworksTable&\Cake\ORM\Association\BelongsTo $Frameworks
 * @property \App\Model\Table\SecurityToolsTable&\Cake\ORM\Association\BelongsTo $SecurityTools
 * @property \App\Model\Table\WebServersTable&\Cake\ORM\Association\BelongsTo $WebServers
 * @property \App\Model\Table\UnitKerjaTable&\Cake\ORM\Association\BelongsTo $UnitKerja
 * @property \App\Model\Table\CloudProviderUsagesTable&\Cake\ORM\Association\HasMany $CloudProviderUsages
 * @property \App\Model\Table\ContainerUsagesTable&\Cake\ORM\Association\HasMany $ContainerUsages
 * @property \App\Model\Table\DbmsUsagesTable&\Cake\ORM\Association\HasMany $DbmsUsages
 * @property \App\Model\Table\DevopsToolUsagesTable&\Cake\ORM\Association\HasMany $DevopsToolUsages
 * @property \App\Model\Table\FrameworkUsagesTable&\Cake\ORM\Association\HasMany $FrameworkUsages
 * @property \App\Model\Table\ProgrammingLanguageUsagesTable&\Cake\ORM\Association\HasMany $ProgrammingLanguageUsages
 *
 * @method \App\Model\Entity\InformationSystemDetail newEmptyEntity()
 * @method \App\Model\Entity\InformationSystemDetail newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\InformationSystemDetail> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InformationSystemDetail get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\InformationSystemDetail findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\InformationSystemDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\InformationSystemDetail> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InformationSystemDetail|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\InformationSystemDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\InformationSystemDetail>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InformationSystemDetail>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InformationSystemDetail>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InformationSystemDetail> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InformationSystemDetail>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InformationSystemDetail>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InformationSystemDetail>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InformationSystemDetail> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InformationSystemDetailsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('information_system_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('InformationSystems', [
            'foreignKey' => 'information_system_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Dbms', [
            'foreignKey' => 'dbms_id',
        ]);
        $this->belongsTo('AppType', [
            'foreignKey' => 'app_type_id',
        ]);
        $this->belongsTo('ContainerTechnologies', [
            'foreignKey' => 'container_tech_id',
        ]);
        $this->belongsTo('DevopsTools', [
            'foreignKey' => 'devops_tool_id',
        ]);
        $this->belongsTo('Frameworks', [
            'foreignKey' => 'framework_id',
        ]);
        $this->belongsTo('SecurityTools', [
            'foreignKey' => 'security_tool_id',
        ]);
        $this->belongsTo('WebServers', [
            'foreignKey' => 'web_server_id',
        ]);
        $this->belongsTo('UnitKerja', [
            'foreignKey' => 'unit_kerja_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('CloudProviderUsages', [
            'foreignKey' => 'information_system_detail_id',
        ]);
        $this->hasMany('ContainerUsages', [
            'foreignKey' => 'information_system_detail_id',
        ]);
        $this->hasMany('DbmsUsages', [
            'foreignKey' => 'information_system_detail_id',
        ]);
        $this->hasMany('DevopsToolUsages', [
            'foreignKey' => 'information_system_detail_id',
        ]);
        $this->hasMany('FrameworkUsages', [
            'foreignKey' => 'information_system_detail_id',
        ]);
        $this->hasMany('ProgrammingLanguageUsages', [
            'foreignKey' => 'information_system_detail_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->uuid('information_system_id')
            ->notEmptyString('information_system_id');

        $validator
            ->scalar('system_type')
            ->maxLength('system_type', 50)
            ->allowEmptyString('system_type');

        $validator
            ->scalar('dev_status')
            ->maxLength('dev_status', 50)
            ->allowEmptyString('dev_status');

        $validator
            ->scalar('ip_address')
            ->maxLength('ip_address', 39)
            ->allowEmptyString('ip_address');

        $validator
            ->scalar('other_program_lang')
            ->maxLength('other_program_lang', 100)
            ->allowEmptyString('other_program_lang');

        $validator
            ->uuid('dbms_id')
            ->allowEmptyString('dbms_id');

        $validator
            ->scalar('dbms_ver')
            ->maxLength('dbms_ver', 50)
            ->allowEmptyString('dbms_ver');

        $validator
            ->scalar('other_dbms')
            ->maxLength('other_dbms', 100)
            ->allowEmptyString('other_dbms');

        $validator
            ->uuid('app_type_id')
            ->allowEmptyString('app_type_id');

        $validator
            ->uuid('container_tech_id')
            ->allowEmptyString('container_tech_id');

        $validator
            ->uuid('devops_tool_id')
            ->allowEmptyString('devops_tool_id');

        $validator
            ->uuid('framework_id')
            ->allowEmptyString('framework_id');

        $validator
            ->uuid('security_tool_id')
            ->allowEmptyString('security_tool_id');

        $validator
            ->uuid('web_server_id')
            ->allowEmptyString('web_server_id');

        $validator
            ->scalar('developer')
            ->maxLength('developer', 255)
            ->allowEmptyString('developer');

        $validator
            ->scalar('pic')
            ->maxLength('pic', 255)
            ->allowEmptyString('pic');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->boolean('is_active')
            ->allowEmptyString('is_active');

        $validator
            ->scalar('system_name')
            ->maxLength('system_name', 255)
            ->allowEmptyString('system_name')
            ->add('system_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('domain')
            ->maxLength('domain', 255)
            ->allowEmptyString('domain');

        $validator
            ->uuid('unit_kerja_id')
            ->notEmptyString('unit_kerja_id');

        $validator
            ->uuid('backend_programming_language_id')
            ->allowEmptyString('backend_programming_language_id');

        $validator
            ->uuid('frontend_programming_language_id')
            ->allowEmptyString('frontend_programming_language_id');

        $validator
            ->scalar('backend_program_lang_ver')
            ->maxLength('backend_program_lang_ver', 50)
            ->allowEmptyString('backend_program_lang_ver');

        $validator
            ->scalar('frontend_program_lang_ver')
            ->maxLength('frontend_program_lang_ver', 50)
            ->allowEmptyString('frontend_program_lang_ver');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['system_name'], ['allowMultipleNulls' => true]), ['errorField' => 'system_name']);
        $rules->add($rules->existsIn(['information_system_id'], 'InformationSystems'), ['errorField' => 'information_system_id']);
        $rules->add($rules->existsIn(['dbms_id'], 'Dbms'), ['errorField' => 'dbms_id']);
        $rules->add($rules->existsIn(['app_type_id'], 'AppType'), ['errorField' => 'app_type_id']);
        $rules->add($rules->existsIn(['container_tech_id'], 'ContainerTechnologies'), ['errorField' => 'container_tech_id']);
        $rules->add($rules->existsIn(['devops_tool_id'], 'DevopsTools'), ['errorField' => 'devops_tool_id']);
        $rules->add($rules->existsIn(['framework_id'], 'Frameworks'), ['errorField' => 'framework_id']);
        $rules->add($rules->existsIn(['security_tool_id'], 'SecurityTools'), ['errorField' => 'security_tool_id']);
        $rules->add($rules->existsIn(['web_server_id'], 'WebServers'), ['errorField' => 'web_server_id']);
        $rules->add($rules->existsIn(['unit_kerja_id'], 'UnitKerja'), ['errorField' => 'unit_kerja_id']);

        return $rules;
    }
}
