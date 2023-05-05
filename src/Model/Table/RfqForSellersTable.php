<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RfqForSellers Model
 *
 * @method \App\Model\Entity\RfqForSeller newEmptyEntity()
 * @method \App\Model\Entity\RfqForSeller newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RfqForSeller[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RfqForSeller get($primaryKey, $options = [])
 * @method \App\Model\Entity\RfqForSeller findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RfqForSeller patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RfqForSeller[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RfqForSeller|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfqForSeller saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfqForSeller[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqForSeller[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqForSeller[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqForSeller[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RfqForSellersTable extends Table
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

        $this->setTable('rfq_for_sellers');
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
            ->integer('seller_id')
            ->requirePresence('seller_id', 'create')
            ->notEmptyString('seller_id');

        $validator
            ->integer('rfq_no')
            ->requirePresence('rfq_no', 'create')
            ->notEmptyString('rfq_no');

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
        $rules->add($rules->isUnique(['seller_id', 'rfq_no']), ['errorField' => 'seller_id']);

        return $rules;
    }
}
