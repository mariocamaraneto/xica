<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendasProduto Entity.
 *
 * @property int $venda_id
 * @property \App\Model\Entity\Venda $venda
 * @property int $produto_id
 * @property \App\Model\Entity\Produto $produto
 * @property int $pagamento_id
 * @property \App\Model\Entity\Pagamento $pagamento
 * @property int $quantidade
 */
class VendasProduto extends Entity
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
        'venda_id' => false,
        'produto_id' => false,
    ];
}
