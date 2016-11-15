<?php
namespace Cirici\Metatags\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Utility\Inflector;
use Cake\Event\Event;
use Cake\ORM\Query;
use ArrayObject;

/**
 * Metataggeable behavior
 */
class MetataggeableBehavior extends Behavior
{
    protected $_defaultConfig = [
        'metataggeableClass'  => 'Metataggeds',
        'foreignKey'          => 'foreign_key',
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
            'className'  => $config['metataggeableClass'],
            'foreignKey' => $config['foreignKey'],
            'conditions' => [
                'Metataggeds.model' => $model
            ]
        ));
    }

    public function beforeFind(Event $event, Query $query, ArrayObject $options, $primary)
    {
         $query->contain(['Metataggeds.Metatags']);
    }


}
