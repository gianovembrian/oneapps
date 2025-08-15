<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SecurityTools Model
 *
 * @property \App\Model\Table\InformationSystemDetailsTable&\Cake\ORM\Association\HasMany $InformationSystemDetails
 *
 * @method \App\Model\Entity\SecurityTool newEmptyEntity()
 * @method \App\Model\Entity\SecurityTool newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\SecurityTool> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SecurityTool get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\SecurityTool findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\SecurityTool patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\SecurityTool> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SecurityTool|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\SecurityTool saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\SecurityTool>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SecurityTool>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SecurityTool>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SecurityTool> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SecurityTool>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SecurityTool>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SecurityTool>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SecurityTool> deleteManyOrFail(iterable $entities, array $options = [])
 */
class SecurityToolsTable extends Table
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

        $this->setTable('security_tools');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('InformationSystemDetails', [
            'foreignKey' => 'security_tool_id',
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
            ->scalar('category')
            ->maxLength('category', 50)
            ->allowEmptyString('category');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }
}
