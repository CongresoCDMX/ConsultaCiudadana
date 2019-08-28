<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dictaman Entity
 *
 * @property int $id_dictamen
 * @property int $id_iniciativa
 * @property int $id_estatus
 * @property string|null $dictamen
 */
class Dictaman extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id_iniciativa' => true,
        'id_estatus' => true,
        'dictamen' => true,
        'url' => true
    ];
}
