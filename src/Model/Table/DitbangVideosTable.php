<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DitbangVideos Model
 *
 * @method \App\Model\Entity\DitbangVideo newEmptyEntity()
 * @method \App\Model\Entity\DitbangVideo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\DitbangVideo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DitbangVideo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\DitbangVideo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\DitbangVideo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\DitbangVideo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DitbangVideo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\DitbangVideo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\DitbangVideo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DitbangVideo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DitbangVideo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DitbangVideo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DitbangVideo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DitbangVideo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\DitbangVideo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\DitbangVideo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DitbangVideosTable extends Table
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

        $this->setTable('ditbang_videos');
        $this->setDisplayField('title');
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('file')
            ->maxLength('file', 255)
            ->allowEmptyFile('file');

        return $validator;
    }
}
