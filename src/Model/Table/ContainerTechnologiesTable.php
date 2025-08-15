<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContainerTechnologies Model
 *
 * @property \App\Model\Table\ContainerUsagesTable&\Cake\ORM\Association\HasMany $ContainerUsages
 *
 * @method \App\Model\Entity\ContainerTechnology newEmptyEntity()
 * @method \App\Model\Entity\ContainerTechnology newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ContainerTechnology> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContainerTechnology get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ContainerTechnology findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ContainerTechnology patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ContainerTechnology> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContainerTechnology|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ContainerTechnology saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ContainerTechnology>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ContainerTechnology>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ContainerTechnology>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ContainerTechnology> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ContainerTechnology>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ContainerTechnology>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ContainerTechnology>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ContainerTechnology> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ContainerTechnologiesTable extends Table
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

        $this->setTable('container_technologies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ContainerUsages', [
            'foreignKey' => 'container_technology_id',
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
            ->scalar('type')
            ->maxLength('type', 50)
            ->allowEmptyString('type');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }
}
