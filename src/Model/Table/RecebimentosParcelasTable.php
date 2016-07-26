<?php
namespace App\Model\Table;

use App\Model\Entity\RecebimentosParcela;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecebimentosParcelas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Parcelas
 * @property \Cake\ORM\Association\BelongsTo $Recebimentos
 */
class RecebimentosParcelasTable extends Table
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

        $this->table('recebimentos_parcelas');
        $this->displayField('parcelas_id');
        $this->primaryKey(['parcelas_id', 'recebimentos_id']);

        $this->belongsTo('Parcelas', [
            'foreignKey' => 'parcelas_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Recebimentos', [
            'foreignKey' => 'recebimentos_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['parcelas_id'], 'Parcelas'));
        $rules->add($rules->existsIn(['recebimentos_id'], 'Recebimentos'));
        return $rules;
    }
}
