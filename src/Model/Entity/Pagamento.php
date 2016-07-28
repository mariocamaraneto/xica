<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pagamento Entity.
 *
 * @property int $id
 * @property string $data
 * @property string $valor
 * @property string $forma_pagamento
 * @property string $observacoes
 * @property int $fornecedores_id
 * @property \App\Model\Entity\Fornecedor $fornecedor
 * @property int $funcionarios_id
 * @property \App\Model\Entity\Funcionario $funcionario
 * @property \App\Model\Entity\VendasProduto[] $vendas_produtos
 */
class Pagamento extends Entity
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
