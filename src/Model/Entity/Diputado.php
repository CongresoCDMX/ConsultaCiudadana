<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Diputado Entity
 *
 * @property int $id_diputado
 * @property string $nombre
 * @property int $id_partido
 */
class Diputado extends Entity
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
        'nombre' => true,
        'id_partido' => true
    ];
}
