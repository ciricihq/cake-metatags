<?php
namespace Cirici\Metatags\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Utility\Inflector;
use Cake\Event\Event;
use Cake\ORM\Query;
use ArrayObject;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Entity;

/**
 * Metatageable behavior
 */
class MetatageableBehavior extends Behavior
{
    protected $_defaultConfig = [
        'metatageableClass'  => 'Metataggeds',
        'foreignKey'          => 'foreign_key',
        'title'               => 'Club Metropolitan',
        'description'         => '',
        'keywords'            => ''
    ];

    public function __construct(Table $Table, array $config = [])
    {
        parent::__construct($Table, $config);
    }

    public function initialize(array $config)
    {
        $config = $this->config();
        $model = Inflector::singularize($this->_table->registryAlias());
        $this->_table->hasMany('Metataggeds', array(
            'className'  => $config['metatageableClass'],
            'foreignKey' => $config['foreignKey'],
            'conditions' => [
                'Metataggeds.model' => $model
            ]
        ));
        $metatags = null;
    }

    public function beforeFind(Event $event, Query $query, ArrayObject $options, $primary)
    {
        $query->find('Metatagged');
    }

    public function findMetatagged(Query $query, array $options)
    {
        return $query
            ->contain(['Metataggeds.Metatags'])
            ->formatResults(function ($results) {
                return $this->mapResults($results);
            })
        ;
    }

    public function mapResults(ResultSetInterface $results) {
        $this->metatags = $results->first()->metataggeds;
        return $results->map(function ($entity) {
            return $this->mapEntity($entity);
        });
    }

    public function mapEntity(Entity $entity) {
        foreach ($this->metatags as $metatags) {
            if($metatags->metatag['name'] == 'title') {
                $entity['_title'] = $metatags->value;
            }
            if($metatags->metatag['name'] == 'description') {
                $entity['_description'] = $metatags->value;
            }
            if($metatags->metatag['name'] == 'keywords') {
                $entity['_keywords'] = $metatags->value;
            }
        }
        return $entity;
    }
}
