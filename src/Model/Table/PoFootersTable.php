<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PoFooters Model
 *
 * @property \App\Model\Table\PoHeadersTable&\Cake\ORM\Association\BelongsTo $PoHeaders
 *
 * @method \App\Model\Entity\PoFooter newEmptyEntity()
 * @method \App\Model\Entity\PoFooter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PoFooter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PoFooter get($primaryKey, $options = [])
 * @method \App\Model\Entity\PoFooter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PoFooter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PoFooter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PoFooter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PoFooter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PoFooter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PoFooter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PoFooter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PoFooter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PoFootersTable extends Table
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

        $this->setTable('po_footers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('PoHeaders', [
            'foreignKey' => 'po_header_id',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('DeliveryDetails', [
            'foreignKey' => 'po_footer_id',
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
            ->scalar('item')
            ->maxLength('item', 5)
            ->requirePresence('item', 'create')
            ->notEmptyString('item');

        $validator
            ->scalar('material')
            ->maxLength('material', 18)
            ->requirePresence('material', 'create')
            ->notEmptyString('material');

        $validator
            ->scalar('short_text')
            ->maxLength('short_text', 40)
            ->requirePresence('short_text', 'create')
            ->notEmptyString('short_text');

        $validator
            ->decimal('po_qty')
            ->requirePresence('po_qty', 'create')
            ->notEmptyString('po_qty');

        $validator
            ->decimal('grn_qty')
            ->requirePresence('grn_qty', 'create')
            ->notEmptyString('grn_qty');

        $validator
            ->decimal('pending_qty')
            ->requirePresence('pending_qty', 'create')
            ->notEmptyString('pending_qty');

        $validator
            ->scalar('order_unit')
            ->maxLength('order_unit', 3)
            ->requirePresence('order_unit', 'create')
            ->notEmptyString('order_unit');

        $validator
            ->decimal('net_price')
            ->requirePresence('net_price', 'create')
            ->notEmptyString('net_price');

        $validator
            ->scalar('price_unit')
            ->maxLength('price_unit', 3)
            ->requirePresence('price_unit', 'create')
            ->notEmptyString('price_unit');

        $validator
            ->decimal('net_value')
            ->requirePresence('net_value', 'create')
            ->notEmptyString('net_value');

        $validator
            ->decimal('gross_value')
            ->requirePresence('gross_value', 'create')
            ->notEmptyString('gross_value');

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
        $rules->add($rules->existsIn('po_header_id', 'PoHeaders'), ['errorField' => 'po_header_id']);

        return $rules;
    }
}
