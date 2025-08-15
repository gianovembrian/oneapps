<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SkIndikator Model
 *
 * @method \App\Model\Entity\SkIndikator newEmptyEntity()
 * @method \App\Model\Entity\SkIndikator newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\SkIndikator> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SkIndikator get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\SkIndikator findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\SkIndikator patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\SkIndikator> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SkIndikator|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\SkIndikator saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\SkIndikator>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SkIndikator>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SkIndikator>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SkIndikator> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SkIndikator>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SkIndikator>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SkIndikator>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SkIndikator> deleteManyOrFail(iterable $entities, array $options = [])
 */
class SkIndikatorTable extends Table
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

        $this->setTable('sk_indikator');
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
            ->allowEmptyString('tahun');

        $validator
            ->allowEmptyString('jumlah_sk');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->allowEmptyString('status');

        $validator
            ->scalar('jenis_penugasan')
            ->maxLength('jenis_penugasan', 255)
            ->allowEmptyString('jenis_penugasan');

        return $validator;
    }
}
