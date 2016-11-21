<?php
namespace Cirici\Metatags\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Event\Event;
use Cake\Event\EventDispatcherTrait;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;

/**
 * Metatags component
 */
class MetatagComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    protected $_controller;
    protected $_model;
    protected $_field;

    /**
     * Initialize properties.
     *
     * @param array $config The config data.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->controller = $this->_registry->getController();
        $this->model = $this->controller->modelClass;
        $this->field = Inflector::singularize(strtolower($this->model));
        if (isset($config['field'])) {
            $this->field = $config['field'];
        }
        TableRegistry::get($this->model)->addBehavior('Cirici/Metatags.Metatageable');
    }
    public function beforeRender(Event $event)
    {
        $this->controller->set('title', 'Club Metropolitan');
        $this->controller->set('description', '');
        $this->controller->set('keywords', '');
        if (isset($this->controller->viewVars[$this->field])) {
            $var = $this->controller->viewVars[$this->field];
            if (isset($var->metataggeds)) {
                foreach ($var->metataggeds as $metatagged) {
                    $this->controller->set($metatagged['metatag']['name'], $metatagged->value);
                }
            }
        }
    }
}
