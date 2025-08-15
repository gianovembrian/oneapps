<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VSkIndikatorApi Model
 *
 * @method \App\Model\Entity\VSkIndikatorApi newEmptyEntity()
 * @method \App\Model\Entity\VSkIndikatorApi newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\VSkIndikatorApi> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VSkIndikatorApi get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\VSkIndikatorApi findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\VSkIndikatorApi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\VSkIndikatorApi> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VSkIndikatorApi|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\VSkIndikatorApi saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\VSkIndikatorApi>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VSkIndikatorApi>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\VSkIndikatorApi>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VSkIndikatorApi> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\VSkIndikatorApi>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VSkIndikatorApi>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\VSkIndikatorApi>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VSkIndikatorApi> deleteManyOrFail(iterable $entities, array $options = [])
 */
class VSkIndikatorApiTable extends Table
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

        $this->setTable('v_sk_indikator_api');
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
            ->scalar('nip')
            ->allowEmptyString('nip');

        $validator
            ->scalar('indikator_kinerja')
            ->allowEmptyString('indikator_kinerja');

        $validator
            ->integer('bulan')
            ->allowEmptyString('bulan');

        $validator
            ->scalar('komponen_id')
            ->allowEmptyString('komponen_id');

        $validator
            ->scalar('nama')
            ->allowEmptyString('nama');

        $validator
            ->scalar('posisi')
            ->allowEmptyString('posisi');

        $validator
            ->allowEmptyString('sasaran_kinerja');

        $validator
            ->allowEmptyString('tahun');

        $validator
            ->allowEmptyString('komponen_score');

        $validator
            ->dateTime('last_update')
            ->allowEmptyDateTime('last_update');

        return $validator;
    }
}
