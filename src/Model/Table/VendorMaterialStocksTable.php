<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendorMaterialStocks Model
 *
 * @method \App\Model\Entity\VendorMaterialStock newEmptyEntity()
 * @method \App\Model\Entity\VendorMaterialStock newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VendorMaterialStock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorMaterialStock get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorMaterialStock findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VendorMaterialStock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorMaterialStock[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorMaterialStock|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorMaterialStock saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorMaterialStock[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorMaterialStock[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorMaterialStock[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorMaterialStock[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendorMaterialStocksTable extends Table
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

        $this->setTable('vendor_material_stocks');
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
            ->scalar('sap_vendor_code')
            ->maxLength('sap_vendor_code', 10)
            ->requirePresence('sap_vendor_code', 'create')
            ->notEmptyString('sap_vendor_code');

        $validator
            ->scalar('material')
            ->maxLength('material', 18)
            ->allowEmptyString('material');

        $validator
            ->scalar('part_code')
            ->maxLength('part_code', 20)
            ->requirePresence('part_code', 'create')
            ->notEmptyString('part_code');

        $validator
            ->scalar('material_desc')
            ->maxLength('material_desc', 40)
            ->allowEmptyString('material_desc');

        $validator
            ->decimal('current_stock')
            ->requirePresence('current_stock', 'create')
            ->notEmptyString('current_stock');

        $validator
            ->decimal('production_stock')
            ->requirePresence('production_stock', 'create')
            ->notEmptyString('production_stock');

        $validator
            ->boolean('status')
            ->notEmptyString('status');

        $validator
            ->dateTime('added_date')
            ->notEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->notEmptyDateTime('updated_date');

        return $validator;
    }
}
