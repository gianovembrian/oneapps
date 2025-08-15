<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CloudProviderUsages Model
 *
 * @property \App\Model\Table\InformationSystemDetailsTable&\Cake\ORM\Association\BelongsTo $InformationSystemDetails
 * @property \App\Model\Table\CloudProvidersTable&\Cake\ORM\Association\BelongsTo $CloudProviders
 *
 * @method \App\Model\Entity\CloudProviderUsage newEmptyEntity()
 * @method \App\Model\Entity\CloudProviderUsage newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CloudProviderUsage> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CloudProviderUsage get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CloudProviderUsage findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CloudProviderUsage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CloudProviderUsage> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CloudProviderUsage|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CloudProviderUsage saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CloudProviderUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CloudProviderUsage>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CloudProviderUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CloudProviderUsage> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CloudProviderUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CloudProviderUsage>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CloudProviderUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CloudProviderUsage> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CloudProviderUsagesTable extends Table
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

        $this->setTable('cloud_provider_usages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('InformationSystemDetails', [
            'foreignKey' => 'information_system_detail_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('CloudProviders', [
            'foreignKey' => 'cloud_provider_id',
            'joinType' => 'INNER',
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
            ->uuid('information_system_detail_id')
            ->notEmptyString('information_system_detail_id');

        $validator
            ->uuid('cloud_provider_id')
            ->notEmptyString('cloud_provider_id');

        $validator
            ->scalar('service_type')
            ->maxLength('service_type', 100)
            ->allowEmptyString('service_type');

        $validator
            ->scalar('usage_notes')
            ->allowEmptyString('usage_notes');

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
        $rules->add($rules->existsIn(['information_system_detail_id'], 'InformationSystemDetails'), ['errorField' => 'information_system_detail_id']);
        $rules->add($rules->existsIn(['cloud_provider_id'], 'CloudProviders'), ['errorField' => 'cloud_provider_id']);

        return $rules;
    }
}
