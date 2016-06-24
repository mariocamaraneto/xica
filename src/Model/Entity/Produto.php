<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $marca
 * @property string $material
 * @property string $cor
 * @property string $referencia
 * @property float $custo_bruto
 * @property float $preco
 * @property string $descricao
 * @property int $fornecedor_id
 * @property \App\Model\Entity\Fornecedor $fornecedor
 * @property int $quantidade
 * @property \App\Model\Entity\Venda[] $vendas
 */
class Produto extends Entity
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
