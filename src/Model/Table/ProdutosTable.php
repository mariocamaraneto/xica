<?php
namespace App\Model\Table;

use App\Model\Entity\Produto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produtos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Fornecedores
 * @property \Cake\ORM\Association\BelongsToMany $Vendas
 */
class ProdutosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('produtos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Fornecedores', [
            'foreignKey' => 'fornecedor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Vendas', [
            'foreignKey' => 'produto_id',
            'targetForeignKey' => 'venda_id',
            'joinTable' => 'vendas_produtos'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->allowEmpty('marca');

        $validator
            ->allowEmpty('material');

        $validator
            ->allowEmpty('cor');

        $validator
            ->allowEmpty('referencia');

        $validator
            ->decimal('custo_bruto')
            ->allowEmpty('custo_bruto');

        $validator
            ->decimal('preco')
            ->allowEmpty('preco');

        $validator
            ->allowEmpty('descricao');

        $validator
            ->integer('quantidade')
            ->requirePresence('quantidade', 'create')
            ->notEmpty('quantidade');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['fornecedor_id'], 'Fornecedores'));
        return $rules;
    }
    
    public function findGeralPonderado(Query $query, array $options){
    	$query = $this->find();
    	$query->select(['id', 'nome', 'quantidade', 'preco', 'referencia']);
    	
    	
    	//cada tipo de campo possui um peso, sendo assim, é feito um calculo 
    	//para ranque dizendo quais são os campos que possuem maior peso de matching
    	$pesos = ["nome" => 4, "marca" => 2, "descricao" => 1];
    	$palavras = explode(" ", trim($options['pesquisa']));
    	$palavras = array_diff($palavras, ['']);
    	
    	
    	//Begin - Select com somatório
    	//exemplo (nome LIKE '%camiseta%')* 4 +(marca LIKE '%camiseta%')* 2 +(descricao LIKE '%camiseta%')* 1
    	//string que irá armazenar o select com somatório do ranque
    	$strQuery = "(";    //abre a sentença 
    	foreach ($palavras as $palavra)
    	{	
    		foreach ($pesos as $campo => $peso)
    		{
    			$strQuery = $strQuery."(".$campo." LIKE '%".$palavra."%')*".$peso."+";
    		}
    	}
    	//retira o ultimo '+'
    	$strQuery=substr($strQuery, 0, -1);
    	$strQuery = $strQuery.")"; //fecha a sentença
    	//coloca esse somatorio como variavel 'ranque' e ordena do maior para o menor
    	$query->select(["ranque"=>$strQuery]);
    	$query->order(['ranque' =>'DESC']);
    	//End - Select com samatório
    	
    	//Begin - Where com expressão regular
    	//exemplo: 'WHERE LOWER (nome) RLIKE "(regata|bege)"'
    	foreach ($pesos as $campo => $peso)
    	{
    		$strQuery = '(';
    		foreach ($palavras as $palavra)
    		{
    			$strQuery = $strQuery.$palavra."|";
    		}
    		$strQuery=substr($strQuery, 0, -1);
    		$strQuery = $strQuery.')';
    		$query->orwhere([$campo.' RLIKE ' => $strQuery]);
    	}
    	//End - Where com expressão regular

    	return $query;
    }
}
