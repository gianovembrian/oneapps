<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SecurityToolUsages Model
 *
 * @property \App\Model\Table\InformationSystemsTable&\Cake\ORM\Association\BelongsTo $InformationSystems
 * @property \App\Model\Table\SecurityToolsTable&\Cake\ORM\Association\BelongsTo $SecurityTools
 *
 * @method \App\Model\Entity\SecurityToolUsage newEmptyEntity()
 * @method \App\Model\Entity\SecurityToolUsage newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\SecurityToolUsage> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SecurityToolUsage get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\SecurityToolUsage findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\SecurityToolUsage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\SecurityToolUsage> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SecurityToolUsage|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\SecurityToolUsage saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\SecurityToolUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SecurityToolUsage>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SecurityToolUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SecurityToolUsage> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SecurityToolUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SecurityToolUsage>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SecurityToolUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SecurityToolUsage> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SecurityToolUsagesTable extends Table
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

        $this->setTable('security_tool_usages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('InformationSystems', [
            'foreignKey' => 'information_system_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SecurityTools', [
            'foreignKey' => 'security_tool_id',
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
            ->uuid('information_system_id')
            ->notEmptyString('information_system_id');

        $validator
            ->uuid('security_tool_id')
            ->notEmptyString('security_tool_id');

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
        $rules->add($rules->existsIn(['information_system_id'], 'InformationSystems'), ['errorField' => 'information_system_id']);
        $rules->add($rules->existsIn(['security_tool_id'], 'SecurityTools'), ['errorField' => 'security_tool_id']);

        return $rules;
    }
}
