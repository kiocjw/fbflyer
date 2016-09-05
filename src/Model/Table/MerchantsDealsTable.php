<?php
namespace App\Model\Table;

use App\Model\Entity\MerchantsDeal;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MerchantsDeals Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Merchants
 * @property \Cake\ORM\Association\BelongsTo $Deals
 */
class MerchantsDealsTable extends Table
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

        $this->table('merchants_deals');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Merchants', [
            'foreignKey' => 'merchants_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Deals', [
            'foreignKey' => 'deals_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['merchants_id'], 'Merchants'));
        $rules->add($rules->existsIn(['deals_id'], 'Deals'));
        return $rules;
    }
}
