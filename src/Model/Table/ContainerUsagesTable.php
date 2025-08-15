<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContainerUsages Model
 *
 * @property \App\Model\Table\InformationSystemDetailsTable&\Cake\ORM\Association\BelongsTo $InformationSystemDetails
 * @property \App\Model\Table\ContainerTechnologiesTable&\Cake\ORM\Association\BelongsTo $ContainerTechnologies
 *
 * @method \App\Model\Entity\ContainerUsage newEmptyEntity()
 * @method \App\Model\Entity\ContainerUsage newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ContainerUsage> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContainerUsage get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ContainerUsage findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ContainerUsage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ContainerUsage> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContainerUsage|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ContainerUsage saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ContainerUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ContainerUsage>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ContainerUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ContainerUsage> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ContainerUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ContainerUsage>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ContainerUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ContainerUsage> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContainerUsagesTable extends Table
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

        $this->setTable('container_usages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('InformationSystemDetails', [
            'foreignKey' => 'information_system_detail_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ContainerTechnologies', [
            'foreignKey' => 'container_technology_id',
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
            ->uuid('container_technology_id')
            ->notEmptyString('container_technology_id');

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
        $rules->add($rules->existsIn(['container_technology_id'], 'ContainerTechnologies'), ['errorField' => 'container_technology_id']);

        return $rules;
    }
}
