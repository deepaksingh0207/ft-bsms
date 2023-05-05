<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeliveryDetails Model
 *
 * @property \App\Model\Table\PoHeadersTable&\Cake\ORM\Association\BelongsTo $PoHeaders
 * @property \App\Model\Table\PoFootersTable&\Cake\ORM\Association\BelongsTo $PoFooters
 *
 * @method \App\Model\Entity\DeliveryDetail newEmptyEntity()
 * @method \App\Model\Entity\DeliveryDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DeliveryDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeliveryDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\DeliveryDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DeliveryDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DeliveryDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeliveryDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeliveryDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeliveryDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DeliveryDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DeliveryDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DeliveryDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DeliveryDetailsTable extends Table
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

        $this->setTable('delivery_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('PoHeaders', [
            'foreignKey' => 'po_header_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PoFooters', [
            'foreignKey' => 'po_footer_id',
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
            ->integer('po_header_id')
            ->requirePresence('po_header_id', 'create')
            ->notEmptyString('po_header_id');

        $validator
            ->integer('po_footer_id')
            ->requirePresence('po_footer_id', 'create')
            ->notEmptyString('po_footer_id');

        $validator
            ->scalar('challan_no')
            ->maxLength('challan_no', 20)
            ->requirePresence('challan_no', 'create')
            ->notEmptyString('challan_no');

        $validator
            ->decimal('qty')
            ->requirePresence('qty', 'create')
            ->notEmptyString('qty');

        $validator
            ->scalar('eway_bill_no')
            ->maxLength('eway_bill_no', 15)
            ->requirePresence('eway_bill_no', 'create')
            ->notEmptyString('eway_bill_no');

        $validator
            ->scalar('einvoice_no')
            ->maxLength('einvoice_no', 15)
            ->requirePresence('einvoice_no', 'create')
            ->notEmptyString('einvoice_no');

        $validator
            ->allowEmptyString('challan_document');

        $validator
            ->scalar('status')
            ->maxLength('status', 1)
            ->notEmptyString('status');

        $validator
            ->dateTime('added_date')
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
        $rules->add($rules->existsIn('po_footer_id', 'PoFooters'), ['errorField' => 'po_footer_id']);
        $rules->add($rules->existsIn('po_header_id', 'PoHeaders'), ['errorField' => 'po_header_id']);

        return $rules;
    }
}
