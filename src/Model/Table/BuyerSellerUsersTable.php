<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BuyerSellerUsers Model
 *
 * @method \App\Model\Entity\BuyerSellerUser newEmptyEntity()
 * @method \App\Model\Entity\BuyerSellerUser newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BuyerSellerUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BuyerSellerUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\BuyerSellerUser findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BuyerSellerUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BuyerSellerUser[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BuyerSellerUser|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BuyerSellerUser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BuyerSellerUser[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BuyerSellerUser[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BuyerSellerUser[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BuyerSellerUser[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BuyerSellerUsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('buyer_seller_users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('user_type')
            ->maxLength('username', 10)
            ->requirePresence('user_type', 'create')
            ->notEmptyString('user_type');

        $validator
            ->scalar('username')
            ->maxLength('username', 20)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 100)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('company_name')
            ->maxLength('company_name', 100)
            ->requirePresence('company_name', 'create')
            ->notEmptyString('company_name');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('cities')
            ->maxLength('cities', 100)
            ->requirePresence('cities', 'create')
            ->notEmptyString('cities');

        $validator
            ->scalar('email')
            ->maxLength('email', 50)
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('contact')
            ->maxLength('contact', 10)
            ->requirePresence('contact', 'create')
            ->notEmptyString('contact');

        $validator
            ->scalar('alt_contact')
            ->maxLength('alt_contact', 10)
            ->requirePresence('alt_contact', 'create')
            ->notEmptyString('alt_contact');

        $validator
            ->scalar('business_type')
            ->maxLength('business_type', 20)
            ->requirePresence('business_type', 'create')
            ->notEmptyString('business_type');

        $validator
            ->scalar('TIN')
            ->maxLength('TIN', 11)
            ->requirePresence('TIN', 'create')
            ->requirePresence('TIN', function ($context) {
                if (isset($context['data']['user_type'])) {
                    return $context['data']['user_type'] === 'seller';
                }
                return false;
            });

        $validator
            ->scalar('GST')
            ->maxLength('GST', 15)
            ->requirePresence('GST', 'create')
            ->requirePresence('GST', function ($context) {
                if (isset($context['data']['user_type'])) {
                    return $context['data']['user_type'] === 'seller';
                }
                return false;
            });

        $validator
            ->scalar('product_deals')
            ->requirePresence('product_deals', 'create')
            ->notEmptyString('product_deals');

        $validator
            ->notEmptyString('is_verified');

        $validator
            ->notEmptyString('status');

        $validator
            ->dateTime('added_date')
            ->requirePresence('added_date', 'create')
            ->notEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->notEmptyDateTime('updated_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);

        return $rules;
    }
}
