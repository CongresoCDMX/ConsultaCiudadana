<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Iniciativa Entity
 *
 * @property int $id_iniciativa
 * @property \Cake\I18n\FrozenDate $fecha
 * @property \Cake\I18n\FrozenDate|null $fecha_cierre
 * @property string $tipo
 * @property string $ley
 * @property string $nombre
 * @property int $suscrita
 * @property int $partido
 * @property string $dice
 * @property string $propuesta
 * @property string $turnado
 * @property string|null $segundo_turnado
 * @property string|null $consulta
 * @property string|null $archivo_consulta
 *
 * @property \App\Model\Entity\Diputado[] $diputado
 */
class Iniciativa extends Entity
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
        'fecha' => true,
        'fecha_cierre' => true,
        'tipo' => true,
        'ley' => true,
        'nombre' => true,
        'suscrita' => true,
        'partido' => true,
        'dice' => true,
        'propuesta' => true,
        'turnado' => true,
        'segundo_turnado' => true,
        'consulta' => true,
        'archivo_consulta' => true,
        'diputado' => true
    ];
}
