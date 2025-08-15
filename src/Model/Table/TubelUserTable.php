<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TubelUser Model
 *
 * @method \App\Model\Entity\TubelUser newEmptyEntity()
 * @method \App\Model\Entity\TubelUser newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TubelUser> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TubelUser get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TubelUser findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TubelUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TubelUser> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TubelUser|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TubelUser saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TubelUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TubelUser>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TubelUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TubelUser> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TubelUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TubelUser>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TubelUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TubelUser> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TubelUserTable extends Table
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

        $this->setTable('tubel_user');
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
            ->scalar('pdln_id')
            ->maxLength('pdln_id', 255)
            ->allowEmptyString('pdln_id');

        $validator
            ->integer('id_pegawai')
            ->allowEmptyString('id_pegawai');

        $validator
            ->scalar('nama_lengkap')
            ->maxLength('nama_lengkap', 255)
            ->allowEmptyString('nama_lengkap');

        $validator
            ->scalar('jenis_pegawai')
            ->maxLength('jenis_pegawai', 255)
            ->allowEmptyString('jenis_pegawai');

        $validator
            ->scalar('jenis_penugasan')
            ->maxLength('jenis_penugasan', 255)
            ->allowEmptyString('jenis_penugasan');

        $validator
            ->scalar('nama_unit_kerja')
            ->maxLength('nama_unit_kerja', 255)
            ->allowEmptyString('nama_unit_kerja');

        $validator
            ->scalar('nama_unit_kerja_penempatan')
            ->maxLength('nama_unit_kerja_penempatan', 255)
            ->allowEmptyString('nama_unit_kerja_penempatan');

        $validator
            ->scalar('nidn')
            ->maxLength('nidn', 255)
            ->allowEmptyString('nidn');

        $validator
            ->scalar('nip')
            ->maxLength('nip', 255)
            ->allowEmptyString('nip');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->allowEmptyString('status');

        $validator
            ->scalar('status_pegawai')
            ->maxLength('status_pegawai', 255)
            ->allowEmptyString('status_pegawai');

        $validator
            ->scalar('gelar_depan')
            ->maxLength('gelar_depan', 255)
            ->allowEmptyString('gelar_depan');

        $validator
            ->scalar('gelar_belakang')
            ->maxLength('gelar_belakang', 255)
            ->allowEmptyString('gelar_belakang');

        $validator
            ->scalar('golongan')
            ->maxLength('golongan', 255)
            ->allowEmptyString('golongan');

        return $validator;
    }
}
