<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppType Model
 *
 * @property \App\Model\Table\ListSisfoTable&\Cake\ORM\Association\HasMany $ListSisfo
 *
 * @method \App\Model\Entity\AppType newEmptyEntity()
 * @method \App\Model\Entity\AppType newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\AppType> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppType get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\AppType findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\AppType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\AppType> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppType|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\AppType saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\AppType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AppType>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AppType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AppType> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AppType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AppType>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AppType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AppType> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AppTypeTable extends Table
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

        $this->setTable('app_type');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ListSisfo', [
            'foreignKey' => 'app_type_id',
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
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        return $validator;
    }
}
