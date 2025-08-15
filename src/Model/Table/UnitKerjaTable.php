<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UnitKerja Model
 *
 * @property \App\Model\Table\ListSisfoTable&\Cake\ORM\Association\HasMany $ListSisfo
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\UnitKerja newEmptyEntity()
 * @method \App\Model\Entity\UnitKerja newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\UnitKerja> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UnitKerja get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\UnitKerja findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\UnitKerja patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\UnitKerja> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UnitKerja|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\UnitKerja saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\UnitKerja>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UnitKerja>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UnitKerja>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UnitKerja> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UnitKerja>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UnitKerja>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UnitKerja>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UnitKerja> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UnitKerjaTable extends Table
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

        $this->setTable('unit_kerja');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ListSisfo', [
            'foreignKey' => 'unit_kerja_id',
        ]);
        $this->hasMany('ListSisfoCopy1', [
            'foreignKey' => 'unit_kerja_id',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'unit_kerja_id',
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

        $validator
            ->scalar('code')
            ->maxLength('code', 255)
            ->allowEmptyString('code');

        return $validator;
    }
}
