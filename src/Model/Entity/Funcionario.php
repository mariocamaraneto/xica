<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Funcionario Entity.
 *
 * @property int $id
 * @property string $nome_completo
 * @property string $nome_login
 * @property string $senha
 * @property string $CPF
 * @property string $telefone
 * @property bool $admin
 * @property bool $ativo
 * @property string $descricao
 */
class Funcionario extends Entity
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
    
    protected function _setSenha($senhaPlana){
    	$hasher = new DefaultPasswordHasher();
    	return $hasher->hash($senhaPlana);
    }
    
}
