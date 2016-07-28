<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Parcela Entity.
 *
 * @property int $id
 * @property int $num_parcela
 * @property float $valor_pago
 * @property \Cake\I18n\Time $data_vencimento
 * @property float $valor_total
 * @property int $vendas_id
 * @property \App\Model\Entity\Venda $venda
 * @property \App\Model\Entity\Recebimento[] $recebimentos
 */
class Parcela extends Entity
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
        'id' => false,
    ];
}
