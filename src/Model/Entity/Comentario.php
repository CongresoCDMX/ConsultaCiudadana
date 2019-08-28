<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comentario Entity
 *
 * @property int $id
 * @property int $id_iniciativa
 * @property string $correo
 * @property string|null $comentario
 * @property string|null $archivo
 * @property bool|null $me_gusta
 * @property bool|null $no_gusta
 * @property \Cake\I18n\FrozenTime|null $fecha
 */
class Comentario extends Entity
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
        'correo' => true,
        'comentario' => true,
        'archivo' => true,
        'me_gusta' => true,
        'no_gusta' => true,
        'fecha' => true
    ];
}
