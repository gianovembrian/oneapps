<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DbmsUsages Model
 *
 * @property \App\Model\Table\InformationSystemDetailsTable&\Cake\ORM\Association\BelongsTo $InformationSystemDetails
 * @property \App\Model\Table\DbmsTable&\Cake\ORM\Association\BelongsTo $Dbms
 *
 * @method \App\Model\Entity\DbmsUsage newEmptyEntity()
 * @method \App\Model\Entity\DbmsUsage newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DbmsUsage> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DbmsUsage get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DbmsUsage findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DbmsUsage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DbmsUsage> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DbmsUsage|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DbmsUsage saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DbmsUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DbmsUsage>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DbmsUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DbmsUsage> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DbmsUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DbmsUsage>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DbmsUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DbmsUsage> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DbmsUsagesTable extends Table
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

        $this->setTable('dbms_usages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('InformationSystemDetails', [
            'foreignKey' => 'information_system_detail_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Dbms', [
            'foreignKey' => 'dbms_id',
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
            ->uuid('dbms_id')
            ->notEmptyString('dbms_id');

        $validator
            ->scalar('version')
            ->maxLength('version', 50)
            ->allowEmptyString('version');

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
        $rules->add($rules->existsIn(['dbms_id'], 'Dbms'), ['errorField' => 'dbms_id']);

        return $rules;
    }
}
