<?php
namespace Cirici\Metatags\Model\Entity;

use Cake\ORM\Entity;

/**
 * Metatagged Entity.
 */
class Metatagged extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'model' => true,
        'foreign_key' => true,
        'metatag_id' => true,
        'language' => true,
        'value' => true,
        'metatag' => true,
    ];
}
