<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ListsisfoFiles Model
 *
 * @property \App\Model\Table\ListSisfoTable&\Cake\ORM\Association\BelongsTo $ListSisfo
 *
 * @method \App\Model\Entity\ListsisfoFile newEmptyEntity()
 * @method \App\Model\Entity\ListsisfoFile newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ListsisfoFile> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ListsisfoFile get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ListsisfoFile findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ListsisfoFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ListsisfoFile> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ListsisfoFile|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ListsisfoFile saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ListsisfoFile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ListsisfoFile>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ListsisfoFile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ListsisfoFile> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ListsisfoFile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ListsisfoFile>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ListsisfoFile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ListsisfoFile> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ListsisfoFilesTable extends Table
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

        $this->setTable('listsisfo_files');
        $this->setDisplayField('file_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ListSisfo', [
            'foreignKey' => 'list_sisfo_id',
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
            ->uuid('list_sisfo_id')
            ->notEmptyString('list_sisfo_id');

        $validator
            ->scalar('file_name')
            ->maxLength('file_name', 255)
            ->requirePresence('file_name', 'create')
            ->notEmptyString('file_name');

        $validator
            ->scalar('file_path')
            ->maxLength('file_path', 255)
            ->requirePresence('file_path', 'create')
            ->notEmptyString('file_path');

        $validator
            ->requirePresence('file_size', 'create')
            ->notEmptyString('file_size');

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
        $rules->add($rules->existsIn(['list_sisfo_id'], 'ListSisfo'), ['errorField' => 'list_sisfo_id']);

        return $rules;
    }
}
