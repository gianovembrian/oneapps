<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProgrammingLanguageUsages Model
 *
 * @property \App\Model\Table\InformationSystemDetailsTable&\Cake\ORM\Association\BelongsTo $InformationSystemDetails
 * @property \App\Model\Table\ProgrammingLanguagesTable&\Cake\ORM\Association\BelongsTo $ProgrammingLanguages
 *
 * @method \App\Model\Entity\ProgrammingLanguageUsage newEmptyEntity()
 * @method \App\Model\Entity\ProgrammingLanguageUsage newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ProgrammingLanguageUsage> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProgrammingLanguageUsage get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ProgrammingLanguageUsage findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ProgrammingLanguageUsage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ProgrammingLanguageUsage> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProgrammingLanguageUsage|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ProgrammingLanguageUsage saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ProgrammingLanguageUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProgrammingLanguageUsage>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProgrammingLanguageUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProgrammingLanguageUsage> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProgrammingLanguageUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProgrammingLanguageUsage>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProgrammingLanguageUsage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProgrammingLanguageUsage> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProgrammingLanguageUsagesTable extends Table
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

        $this->setTable('programming_language_usages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('InformationSystemDetails', [
            'foreignKey' => 'information_system_detail_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ProgrammingLanguages', [
            'foreignKey' => 'programming_language_id',
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
            ->uuid('programming_language_id')
            ->notEmptyString('programming_language_id');

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
        $rules->add($rules->existsIn(['programming_language_id'], 'ProgrammingLanguages'), ['errorField' => 'programming_language_id']);

        return $rules;
    }
}
