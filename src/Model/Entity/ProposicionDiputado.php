<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProposicionDiputado Entity
 *
 * @property int $id
 * @property int|null $id_proposicion
 * @property int|null $id_diputado
 */
class ProposicionDiputado extends Entity
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
        'id_proposicion' => true,
        'id_diputado' => true
    ];
}
