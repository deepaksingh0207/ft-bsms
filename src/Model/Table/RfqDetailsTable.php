<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RfqDetails Model
 *
 
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\ProductSubCategoriesTable&\Cake\ORM\Association\BelongsTo $ProductSubCategories
 *
 * @method \App\Model\Entity\RfqDetail newEmptyEntity()
 * @method \App\Model\Entity\RfqDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RfqDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RfqDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\RfqDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RfqDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RfqDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RfqDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfqDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfqDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RfqDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RfqDetailsTable extends Table
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

        $this->setTable('rfq_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        
        $this->belongsTo('BuyerSellerUsers', [
            'foreignKey' => 'buyer_seller_user_id',
            'joinType' => 'INNER',
        ]);
        
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        
        $this->belongsTo('Uoms', [
            'foreignKey' => 'uom_code',
            'joinType' => 'INNER',
        ]);
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
            ->integer('product_id')
            ->requirePresence('product_id', 'create')
            ->notEmptyString('product_id');

            

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
        //$rules->add($rules->existsIn('product_id', 'Products'), ['errorField' => 'product_id']);
     

        return $rules;
    }
}
