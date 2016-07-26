<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RecebimentosParcela Entity.
 *
 * @property int $parcelas_id
 * @property \App\Model\Entity\Parcela $parcela
 * @property int $recebimentos_id
 * @property \App\Model\Entity\Recebimento $recebimento
 */
class RecebimentosParcela extends Entity
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
        '*' => true,
        'parcelas_id' => false,
        'recebimentos_id' => false,
    ];
}
