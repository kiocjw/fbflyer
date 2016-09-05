<?php
namespace App\Model\Table;

use App\Model\Entity\Deal;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Deals Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsToMany $Merchants
 */
class DealsTable extends Table
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

        $this->table('deals');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'photo' => [
                'fields' => [
                    // if these fields or their defaults exist
                    // the values will be set.
                    'dir' => 'photo_dir', // defaults to `dir`
                    'size' => 'photo_size', // defaults to `size`
                    'type' => 'photo_type', // defaults to `type`
                ],
            ],
        ]);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Merchants', [
            'foreignKey' => 'deals_id',
            'targetForeignKey' => 'merchants_id',
            'joinTable' => 'merchants_deals'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('photo');

        $validator
            ->allowEmpty('photo_dir');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->numeric('actual_price')
            ->requirePresence('actual_price', 'create')
            ->notEmpty('actual_price');

        $validator
            ->numeric('promo_price')
            ->requirePresence('promo_price', 'create')
            ->notEmpty('promo_price');

        $validator
            ->numeric('saved_amount')
            ->requirePresence('saved_amount', 'create')
            ->notEmpty('saved_amount');

        $validator
            ->integer('discount_percentage')
            ->requirePresence('discount_percentage', 'create')
            ->notEmpty('discount_percentage');

        $validator
            ->integer('purchased_number')
            ->requirePresence('purchased_number', 'create')
            ->notEmpty('purchased_number');

        $validator
            ->dateTime('deals_start_date')
            ->requirePresence('deals_start_date', 'create')
            ->notEmpty('deals_start_date');

        $validator
            ->dateTime('deals_end_date')
            ->requirePresence('deals_end_date', 'create')
            ->notEmpty('deals_end_date');

        $validator
            ->requirePresence('additional_info', 'create')
            ->notEmpty('additional_info');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        return $rules;
    }
}
