<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IndikatorKinerja Model
 *
 * @method \App\Model\Entity\IndikatorKinerja newEmptyEntity()
 * @method \App\Model\Entity\IndikatorKinerja newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\IndikatorKinerja> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IndikatorKinerja get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\IndikatorKinerja findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\IndikatorKinerja patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\IndikatorKinerja> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\IndikatorKinerja|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\IndikatorKinerja saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\IndikatorKinerja>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\IndikatorKinerja>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\IndikatorKinerja>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\IndikatorKinerja> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\IndikatorKinerja>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\IndikatorKinerja>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\IndikatorKinerja>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\IndikatorKinerja> deleteManyOrFail(iterable $entities, array $options = [])
 */
class IndikatorKinerjaTable extends Table
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

        $this->setTable('indikator_kinerja');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('no_sk')
            ->maxLength('no_sk', 255)
            ->allowEmptyString('no_sk');

        $validator
            ->scalar('judul_sk')
            ->allowEmptyString('judul_sk');

        $validator
            ->date('tanggal_sk')
            ->allowEmptyDate('tanggal_sk');

        $validator
            ->scalar('unit_pengusul')
            ->maxLength('unit_pengusul', 255)
            ->allowEmptyString('unit_pengusul');

        $validator
            ->scalar('nip')
            ->maxLength('nip', 255)
            ->allowEmptyString('nip');

        $validator
            ->scalar('nama')
            ->maxLength('nama', 255)
            ->allowEmptyString('nama');

        $validator
            ->scalar('posisi')
            ->maxLength('posisi', 255)
            ->allowEmptyString('posisi');

        $validator
            ->allowEmptyString('kode_indikator');

        $validator
            ->scalar('status_sk')
            ->maxLength('status_sk', 255)
            ->allowEmptyString('status_sk');

        $validator
            ->scalar('jenis_penugasan')
            ->maxLength('jenis_penugasan', 255)
            ->allowEmptyString('jenis_penugasan');

        return $validator;
    }
}
