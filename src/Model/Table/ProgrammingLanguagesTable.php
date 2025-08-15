<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProgrammingLanguages Model
 *
 * @property \App\Model\Table\FrameworksTable&\Cake\ORM\Association\HasMany $Frameworks
 * @property \App\Model\Table\InformationSystemDetailsTable&\Cake\ORM\Association\HasMany $InformationSystemDetails
 * @property \App\Model\Table\ProgrammingLanguageUsagesTable&\Cake\ORM\Association\HasMany $ProgrammingLanguageUsages
 *
 * @method \App\Model\Entity\ProgrammingLanguage newEmptyEntity()
 * @method \App\Model\Entity\ProgrammingLanguage newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ProgrammingLanguage> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProgrammingLanguage get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ProgrammingLanguage findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ProgrammingLanguage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ProgrammingLanguage> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProgrammingLanguage|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ProgrammingLanguage saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ProgrammingLanguage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProgrammingLanguage>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProgrammingLanguage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProgrammingLanguage> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProgrammingLanguage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProgrammingLanguage>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProgrammingLanguage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProgrammingLanguage> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProgrammingLanguagesTable extends Table
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

        $this->setTable('programming_languages');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Frameworks', [
            'foreignKey' => 'programming_language_id',
        ]);
        $this->hasMany('InformationSystemDetails', [
            'foreignKey' => 'programming_language_id',
        ]);
        $this->hasMany('ProgrammingLanguageUsages', [
            'foreignKey' => 'programming_language_id',
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
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['name']), ['errorField' => 'name']);

        return $rules;
    }
}
