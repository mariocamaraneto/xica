<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fornecedor Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $CPF_CNPJ
 * @property string $endereco
 * @property string $telefone
 * @property string $email
 * @property string $metodo_pagamento
 * @property string $conta_banco
 * @property string $observacoes
 * @property \App\Model\Entity\Produto[] $produtos
 */
class Fornecedor extends Entity
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
