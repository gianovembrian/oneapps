<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FrameworkUsages Model
 *
 * @property \App\Model\Table\InformationSystemDetailsTable&\Cake\ORM\Association\BelongsTo $InformationSystemDetails
 * @property \App\Model\Table\FrameworksTable&\Cake\ORM\Association\BelongsTo $Frameworks
 *
 * @method \App\Model\Entity\FrameworkUsage newEmptyEntity()
 * @method \App\Model\Entity\FrameworkUsage newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\FrameworkUsage> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FrameworkUsage get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\FrameworkUsage findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\FrameworkUsage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\FrameworkUsage> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FrameworkUsage|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\FrameworkUsage saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\FrameworkUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FrameworkUsage>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FrameworkUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FrameworkUsage> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FrameworkUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FrameworkUsage>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FrameworkUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FrameworkUsage> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FrameworkUsagesTable extends Table
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

        $this->setTable('framework_usages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('InformationSystemDetails', [
            'foreignKey' => 'information_system_detail_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Frameworks', [
            'foreignKey' => 'framework_id',
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
            ->uuid('framework_id')
            ->notEmptyString('framework_id');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

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
        $rules->add($rules->existsIn(['framework_id'], 'Frameworks'), ['errorField' => 'framework_id']);

        return $rules;
    }
}
