<?php
namespace Cirici\Metatags\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Metataggeds Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Metatags
 *
 * @method \Metattaggeds\Model\Entity\Metatagged get($primaryKey, $options = [])
 * @method \Metattaggeds\Model\Entity\Metatagged newEntity($data = null, array $options = [])
 * @method \Metattaggeds\Model\Entity\Metatagged[] newEntities(array $data, array $options = [])
 * @method \Metattaggeds\Model\Entity\Metatagged|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Metattaggeds\Model\Entity\Metatagged patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Metattaggeds\Model\Entity\Metatagged[] patchEntities($entities, array $data, array $options = [])
 * @method \Metattaggeds\Model\Entity\Metatagged findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MetataggedsTable extends Table
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

        $this->table('metataggeds');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Metatags', [
            'foreignKey' => 'metatag_id',
            'className' => 'Cirici/Metatags.Metatags'
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
            ->requirePresence('model', 'create')
            ->notEmpty('model');

        $validator
            ->integer('foreign_key')
            ->requirePresence('foreign_key', 'create')
            ->notEmpty('foreign_key');

        $validator
            ->requirePresence('language', 'create')
            ->notEmpty('language');

        $validator
            ->requirePresence('value', 'create')
            ->notEmpty('value');

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
        $rules->add($rules->existsIn(['metatag_id'], 'Metatags'));

        return $rules;
    }
}
