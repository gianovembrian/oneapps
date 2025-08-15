<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WebServers Model
 *
 * @property \App\Model\Table\InformationSystemDetailsTable&\Cake\ORM\Association\HasMany $InformationSystemDetails
 *
 * @method \App\Model\Entity\WebServer newEmptyEntity()
 * @method \App\Model\Entity\WebServer newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\WebServer> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WebServer get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\WebServer findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\WebServer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\WebServer> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\WebServer|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\WebServer saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\WebServer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WebServer>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\WebServer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WebServer> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\WebServer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WebServer>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\WebServer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WebServer> deleteManyOrFail(iterable $entities, array $options = [])
 */
class WebServersTable extends Table
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

        $this->setTable('web_servers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('InformationSystemDetails', [
            'foreignKey' => 'web_server_id',
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
