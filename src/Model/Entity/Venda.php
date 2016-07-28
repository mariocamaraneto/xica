<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venda Entity.
 *
 * @property int $id
 * @property string $data
 * @property float $total
 * @property string $desconto
 * @property string $forma_pagamento
 * @property int $cliente_id
 * @property \App\Model\Entity\Cliente $cliente
 * @property int $funcionarios_id
 * @property \App\Model\Entity\Funcionario $funcionario
 * @property \App\Model\Entity\Produto[] $produtos
 */
class Venda extends Entity
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
