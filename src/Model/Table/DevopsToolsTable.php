<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DevopsTools Model
 *
 * @property \App\Model\Table\DevopsToolUsagesTable&\Cake\ORM\Association\HasMany $DevopsToolUsages
 * @property \App\Model\Table\InformationSystemDetailsTable&\Cake\ORM\Association\HasMany $InformationSystemDetails
 *
 * @method \App\Model\Entity\DevopsTool newEmptyEntity()
 * @method \App\Model\Entity\DevopsTool newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DevopsTool> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DevopsTool get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DevopsTool findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DevopsTool patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DevopsTool> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DevopsTool|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DevopsTool saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DevopsTool>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DevopsTool>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DevopsTool>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DevopsTool> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DevopsTool>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DevopsTool>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DevopsTool>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DevopsTool> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DevopsToolsTable extends Table
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

        $this->setTable('devops_tools');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('DevopsToolUsages', [
            'foreignKey' => 'devops_tool_id',
        ]);
        $this->hasMany('InformationSystemDetails', [
            'foreignKey' => 'devops_tool_id',
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
