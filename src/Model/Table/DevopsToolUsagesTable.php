<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DevopsToolUsages Model
 *
 * @property \App\Model\Table\InformationSystemDetailsTable&\Cake\ORM\Association\BelongsTo $InformationSystemDetails
 * @property \App\Model\Table\DevopsToolsTable&\Cake\ORM\Association\BelongsTo $DevopsTools
 *
 * @method \App\Model\Entity\DevopsToolUsage newEmptyEntity()
 * @method \App\Model\Entity\DevopsToolUsage newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DevopsToolUsage> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DevopsToolUsage get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DevopsToolUsage findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DevopsToolUsage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DevopsToolUsage> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DevopsToolUsage|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DevopsToolUsage saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DevopsToolUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DevopsToolUsage>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DevopsToolUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DevopsToolUsage> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DevopsToolUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DevopsToolUsage>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DevopsToolUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DevopsToolUsage> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DevopsToolUsagesTable extends Table
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

        $this->setTable('devops_tool_usages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('InformationSystemDetails', [
            'foreignKey' => 'information_system_detail_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('DevopsTools', [
            'foreignKey' => 'devops_tool_id',
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
            ->uuid('devops_tool_id')
            ->notEmptyString('devops_tool_id');

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
        $rules->add($rules->existsIn(['devops_tool_id'], 'DevopsTools'), ['errorField' => 'devops_tool_id']);

        return $rules;
    }
}
