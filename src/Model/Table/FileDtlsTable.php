<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FileDtls Model
 *
 * @property \App\Model\Table\FilesTable|\Cake\ORM\Association\BelongsTo $Files
 *
 * @method \App\Model\Entity\FileDtl get($primaryKey, $options = [])
 * @method \App\Model\Entity\FileDtl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FileDtl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FileDtl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FileDtl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FileDtl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FileDtl findOrCreate($search, callable $callback = null, $options = [])
 */
class FileDtlsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('file_dtls');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Files', [
            'foreignKey' => 'file_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('doc_name')
            ->maxLength('doc_name', 255)
            ->requirePresence('doc_name', 'create')
            ->notEmpty('doc_name');

        $validator
            ->scalar('doc_path')
            ->maxLength('doc_path', 255)
            ->requirePresence('doc_path', 'create')
            ->notEmpty('doc_path');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['file_id'], 'Files'));

        return $rules;
    }
}
