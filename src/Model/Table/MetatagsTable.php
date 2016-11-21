<?php
namespace Cirici\Metatags\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Metatags Model
 *
 * @property \Cake\ORM\Association\HasMany $Metataggeds
 *
 * @method \Metattaggeds\Model\Entity\Metatag get($primaryKey, $options = [])
 * @method \Metattaggeds\Model\Entity\Metatag newEntity($data = null, array $options = [])
 * @method \Metattaggeds\Model\Entity\Metatag[] newEntities(array $data, array $options = [])
 * @method \Metattaggeds\Model\Entity\Metatag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Metattaggeds\Model\Entity\Metatag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Metattaggeds\Model\Entity\Metatag[] patchEntities($entities, array $data, array $options = [])
 * @method \Metattaggeds\Model\Entity\Metatag findOrCreate($search, callable $callback = null)
 */
class MetatagsTable extends Table
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

        $this->table('metatags');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Metataggeds', [
            'foreignKey' => 'metatag_id',
            'className'  => 'Cirici\Metatags.Metataggeds'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        return $validator;
    }
}
