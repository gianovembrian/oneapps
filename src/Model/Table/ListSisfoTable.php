<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ListSisfo Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ListSisfo newEmptyEntity()
 * @method \App\Model\Entity\ListSisfo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ListSisfo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ListSisfo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ListSisfo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ListSisfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ListSisfo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ListSisfo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ListSisfo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ListSisfo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ListSisfo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ListSisfo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ListSisfo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ListSisfo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ListSisfo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ListSisfo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ListSisfo> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ListSisfoTable extends Table
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

        $this->setTable('list_sisfo');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);

        $this->belongsTo('AppType', [
            'foreignKey' => 'app_type_id',
        ]);

        $this->belongsTo('UnitKerja', [
            'foreignKey' => 'unit_kerja_id',
        ]);

        $this->hasMany('ListsisfoFiles', [
            'foreignKey' => 'list_sisfo_id',
            'dependent' => true, // Jika `ListSisfo` dihapus, `ListsisfoFiles` juga dihapus
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
            ->scalar('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->scalar('app_type_id')
            ->allowEmptyString('app_type_id');

        $validator
            ->scalar('unit_kerja_id')
            ->allowEmptyString('unit_kerja_id');

        $validator
            ->scalar('dev_status')
            ->maxLength('dev_status', 16)
            ->allowEmptyString('dev_status');

        $validator
            ->scalar('ip_address')
            ->maxLength('ip_address', 255)
            ->allowEmptyString('ip_address');

        $validator
            ->scalar('program_lang')
            ->maxLength('program_lang', 255)
            ->allowEmptyString('program_lang');

        $validator
            ->scalar('framework')
            ->maxLength('framework', 255)
            ->allowEmptyString('framework');

        $validator
            ->scalar('dbms')
            ->maxLength('dbms', 255)
            ->allowEmptyString('dbms');

        $validator
            ->scalar('developer')
            ->maxLength('developer', 255)
            ->allowEmptyString('developer');

        $validator
            ->scalar('pic')
            ->maxLength('pic', 255)
            ->allowEmptyString('pic');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->allowEmptyString('is_active');

        $validator
            ->scalar('program_lang_ver')
            ->maxLength('program_lang_ver', 255)
            ->allowEmptyString('program_lang_ver');

        $validator
            ->scalar('system_name')
            ->maxLength('system_name', 255)
            ->allowEmptyString('system_name');

        $validator
            ->scalar('domain')
            ->maxLength('domain', 255)
            ->allowEmptyString('domain');

        $validator
            ->scalar('other_program_lang')
            ->maxLength('other_program_lang', 255)
            ->allowEmptyString('other_program_lang');

        $validator
            ->scalar('other_dbms')
            ->maxLength('other_dbms', 255)
            ->allowEmptyString('other_dbms');

        $validator
            ->scalar('dbms_ver')
            ->maxLength('dbms_ver', 255)
            ->allowEmptyString('dbms_ver');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
