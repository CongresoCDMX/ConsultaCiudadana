<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Proposicion Entity
 *
 * @property int $id_proposicion
 * @property string $legislatura
 * @property string $año
 * @property string $periodo
 * @property \Cake\I18n\FrozenDate $fecha_publicacion
 * @property int $no_orden
 * @property string $nombre
 * @property string|null $archivo_consulta
 *
 * @property \App\Model\Entity\Diputado[] $diputado
 */
class Proposicion extends Entity
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
        'legislatura' => true,
        'año' => true,
        'periodo' => true,
        'fecha_publicacion' => true,
        'no_orden' => true,
        'nombre' => true,
        'archivo_consulta' => true,
        'diputado' => true
    ];
}
