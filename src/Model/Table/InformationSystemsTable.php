<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InformationSystems Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AppTypeTable&\Cake\ORM\Association\BelongsTo $AppType
 * @property \App\Model\Table\InformationSystemDetailsTable&\Cake\ORM\Association\HasMany $InformationSystemDetails
 *
 * @method \App\Model\Entity\InformationSystem newEmptyEntity()
 * @method \App\Model\Entity\InformationSystem newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\InformationSystem> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InformationSystem get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\InformationSystem findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\InformationSystem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\InformationSystem> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InformationSystem|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\InformationSystem saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\InformationSystem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InformationSystem>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InformationSystem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InformationSystem> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InformationSystem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InformationSystem>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InformationSystem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InformationSystem> deleteManyOrFail(iterable $entities, array $options = [])
 */
class InformationSystemsTable extends Table
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

        $this->setTable('information_systems');
        $this->setDisplayField('system_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('AppType', [
            'foreignKey' => 'app_type_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('InformationSystemDetails', [
            'foreignKey' => 'information_system_id',
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
            ->scalar('system_name')
            ->maxLength('system_name', 255)
            ->requirePresence('system_name', 'create')
            ->notEmptyString('system_name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->uuid('user_id')
            ->notEmptyString('user_id');

        $validator
            ->uuid('app_type_id')
            ->notEmptyString('app_type_id');

        $validator
            ->scalar('system_status')
            ->maxLength('system_status', 20)
            ->allowEmptyString('system_status');

        $validator
            ->scalar('document_path')
            ->maxLength('document_path', 255)
            ->allowEmptyString('document_path');

        $validator
            ->scalar('repo_url')
            ->allowEmptyString('repo_url');

        $validator
            ->boolean('is_cicd_pipeline')
            ->allowEmptyString('is_cicd_pipeline');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['app_type_id'], 'AppType'), ['errorField' => 'app_type_id']);

        return $rules;
    }
}
