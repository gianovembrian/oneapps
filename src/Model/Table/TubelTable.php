<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tubel Model
 *
 * @property \App\Model\Table\CountriesTable&\Cake\ORM\Association\BelongsTo $Countries
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Tubel newEmptyEntity()
 * @method \App\Model\Entity\Tubel newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tubel> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tubel get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tubel findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tubel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tubel> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tubel|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tubel saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tubel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tubel>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tubel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tubel> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tubel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tubel>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tubel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tubel> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TubelTable extends Table
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

        $this->setTable('tubel');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);

           $this->hasMany('TubelUser', [
            'foreignKey' => 'tubel_id',
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
            ->integer('id_pegawai')
            ->allowEmptyString('id_pegawai');

        $validator
            ->uuid('country_id')
            ->allowEmptyString('country_id');

        $validator
            ->scalar('kegiatan')
            ->allowEmptyString('kegiatan');

        $validator
            ->scalar('tempat_kegiatan')
            ->allowEmptyString('tempat_kegiatan');

        $validator
            ->scalar('penyelenggara')
            ->maxLength('penyelenggara', 255)
            ->allowEmptyString('penyelenggara');

        $validator
            ->date('waktu_mulai_kegiatan')
            ->allowEmptyDate('waktu_mulai_kegiatan');

        $validator
            ->date('waktu_selesai_kegiatan')
            ->allowEmptyDate('waktu_selesai_kegiatan');

        $validator
            ->date('tanggal_berangkat')
            ->allowEmptyDate('tanggal_berangkat');

        $validator
            ->date('tanggal_pulang')
            ->allowEmptyDate('tanggal_pulang');

        $validator
            ->scalar('sumber_biaya')
            ->maxLength('sumber_biaya', 255)
            ->allowEmptyString('sumber_biaya');

        $validator
            ->scalar('informasi_lain')
            ->maxLength('informasi_lain', 255)
            ->allowEmptyString('informasi_lain');

        $validator
            ->scalar('surat_usulan_setneg')
            ->maxLength('surat_usulan_setneg', 255)
            ->allowEmptyString('surat_usulan_setneg');

        $validator
            ->scalar('surat_biaya_setneg')
            ->maxLength('surat_biaya_setneg', 255)
            ->allowEmptyString('surat_biaya_setneg');

        $validator
            ->scalar('kak_setneg')
            ->maxLength('kak_setneg', 255)
            ->allowEmptyString('kak_setneg');

        $validator
            ->scalar('cv_setneg')
            ->maxLength('cv_setneg', 255)
            ->allowEmptyString('cv_setneg');

        $validator
            ->scalar('surat_persetujuan_setneg')
            ->maxLength('surat_persetujuan_setneg', 255)
            ->allowEmptyString('surat_persetujuan_setneg');

        $validator
            ->scalar('surat_undangan_setneg')
            ->maxLength('surat_undangan_setneg', 255)
            ->allowEmptyString('surat_undangan_setneg');

        $validator
            ->scalar('jadwal_kegiatan_setneg')
            ->maxLength('jadwal_kegiatan_setneg', 255)
            ->allowEmptyString('jadwal_kegiatan_setneg');

        $validator
            ->scalar('sk_pns_setneg')
            ->maxLength('sk_pns_setneg', 255)
            ->allowEmptyString('sk_pns_setneg');

        $validator
            ->scalar('ktp_setneg')
            ->maxLength('ktp_setneg', 255)
            ->allowEmptyString('ktp_setneg');

        $validator
            ->scalar('daftar_riwayat_setneg')
            ->maxLength('daftar_riwayat_setneg', 255)
            ->allowEmptyString('daftar_riwayat_setneg');

        $validator
            ->scalar('usulan_kk_setneg')
            ->maxLength('usulan_kk_setneg', 255)
            ->allowEmptyString('usulan_kk_setneg');

        $validator
            ->scalar('surat_usulan_itb')
            ->maxLength('surat_usulan_itb', 255)
            ->allowEmptyString('surat_usulan_itb');

        $validator
            ->scalar('surat_undangan_itb')
            ->maxLength('surat_undangan_itb', 255)
            ->allowEmptyString('surat_undangan_itb');

        $validator
            ->scalar('surat_biaya_itb')
            ->maxLength('surat_biaya_itb', 255)
            ->allowEmptyString('surat_biaya_itb');

        $validator
            ->scalar('jadwal_kegiatan_itb')
            ->maxLength('jadwal_kegiatan_itb', 255)
            ->allowEmptyString('jadwal_kegiatan_itb');

        $validator
            ->scalar('kak_itb')
            ->maxLength('kak_itb', 255)
            ->allowEmptyString('kak_itb');

        $validator
            ->scalar('surat_persetujuan_itb')
            ->maxLength('surat_persetujuan_itb', 255)
            ->allowEmptyString('surat_persetujuan_itb');

        $validator
            ->scalar('usulan_kk_itb')
            ->maxLength('usulan_kk_itb', 255)
            ->allowEmptyString('usulan_kk_itb');

        $validator
            ->scalar('nama_lengkap')
            ->maxLength('nama_lengkap', 255)
            ->allowEmptyString('nama_lengkap');

        $validator
            ->scalar('nip')
            ->maxLength('nip', 255)
            ->allowEmptyString('nip');

        $validator
            ->scalar('nama_unit_kerja')
            ->maxLength('nama_unit_kerja', 255)
            ->allowEmptyString('nama_unit_kerja');

        $validator
            ->scalar('jenis_penugasan')
            ->maxLength('jenis_penugasan', 255)
            ->allowEmptyString('jenis_penugasan');

        $validator
            ->scalar('jenis_pegawai')
            ->maxLength('jenis_pegawai', 255)
            ->allowEmptyString('jenis_pegawai');

        $validator
            ->scalar('jenis_pengajuan')
            ->maxLength('jenis_pengajuan', 10)
            ->allowEmptyString('jenis_pengajuan');

        $validator
            ->scalar('urgensi')
            ->allowEmptyString('urgensi');

        $validator
            ->scalar('approval_status')
            ->maxLength('approval_status', 100)
            ->allowEmptyString('approval_status');

        $validator
            ->scalar('approval_notes')
            ->allowEmptyString('approval_notes');

        $validator
            ->integer('is_new')
            ->allowEmptyString('is_new');

        $validator
            ->uuid('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->dateTime('approval_date')
            ->allowEmptyDateTime('approval_date');

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
        $rules->add($rules->existsIn(['country_id'], 'Countries'), ['errorField' => 'country_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
