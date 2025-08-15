<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CloudProviders Model
 *
 * @property \App\Model\Table\CloudProviderUsagesTable&\Cake\ORM\Association\HasMany $CloudProviderUsages
 *
 * @method \App\Model\Entity\CloudProvider newEmptyEntity()
 * @method \App\Model\Entity\CloudProvider newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CloudProvider> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CloudProvider get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CloudProvider findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CloudProvider patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CloudProvider> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CloudProvider|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CloudProvider saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CloudProvider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CloudProvider>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CloudProvider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CloudProvider> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CloudProvider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CloudProvider>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CloudProvider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CloudProvider> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CloudProvidersTable extends Table
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

        $this->setTable('cloud_providers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('CloudProviderUsages', [
            'foreignKey' => 'cloud_provider_id',
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
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }
}
