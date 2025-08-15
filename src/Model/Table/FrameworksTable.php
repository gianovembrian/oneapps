<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Frameworks Model
 *
 * @property \App\Model\Table\ProgrammingLanguagesTable&\Cake\ORM\Association\BelongsTo $ProgrammingLanguages
 * @property \App\Model\Table\FrameworkUsagesTable&\Cake\ORM\Association\HasMany $FrameworkUsages
 * @property \App\Model\Table\InformationSystemDetailsTable&\Cake\ORM\Association\HasMany $InformationSystemDetails
 *
 * @method \App\Model\Entity\Framework newEmptyEntity()
 * @method \App\Model\Entity\Framework newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Framework> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Framework get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Framework findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Framework patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Framework> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Framework|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Framework saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Framework>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Framework>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Framework>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Framework> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Framework>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Framework>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Framework>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Framework> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FrameworksTable extends Table
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

        $this->setTable('frameworks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ProgrammingLanguages', [
            'foreignKey' => 'programming_language_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('FrameworkUsages', [
            'foreignKey' => 'framework_id',
        ]);
        $this->hasMany('InformationSystemDetails', [
            'foreignKey' => 'framework_id',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->uuid('programming_language_id')
            ->notEmptyString('programming_language_id');

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
        $rules->add($rules->existsIn(['programming_language_id'], 'ProgrammingLanguages'), ['errorField' => 'programming_language_id']);

        return $rules;
    }
}
