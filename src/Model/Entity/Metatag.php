<?php
namespace Cirici\Metatags\Model\Entity;

use Cake\ORM\Entity;

/**
 * Metatag Entity
 */
class Metatag extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'type' => true,
        'metataggeds' => true,
    ];
}
