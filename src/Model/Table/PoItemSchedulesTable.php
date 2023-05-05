<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PoItemSchedules Model
 *
 * @property \App\Model\Table\PoHeadersTable&\Cake\ORM\Association\BelongsTo $PoHeaders
 * @property \App\Model\Table\PoFootersTable&\Cake\ORM\Association\BelongsTo $PoFooters
 *
 * @method \App\Model\Entity\PoItemSchedule newEmptyEntity()
 * @method \App\Model\Entity\PoItemSchedule newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PoItemSchedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PoItemSchedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\PoItemSchedule findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PoItemSchedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PoItemSchedule[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PoItemSchedule|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PoItemSchedule saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PoItemSchedule[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PoItemSchedule[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PoItemSchedule[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PoItemSchedule[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PoItemSchedulesTable extends Table
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

        $this->setTable('po_item_schedules');

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
            ->decimal('actual_qty')
            ->requirePresence('actual_qty', 'create')
            ->notEmptyString('actual_qty');

        $validator
            ->decimal('received_qty')
            ->notEmptyString('received_qty');

        $validator
            ->date('delivery_date')
            ->requirePresence('delivery_date', 'create')
            ->notEmptyDate('delivery_date');

        $validator
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
        $rules->add($rules->existsIn('po_header_id', 'PoHeaders'), ['errorField' => 'po_header_id']);
        $rules->add($rules->existsIn('po_footer_id', 'PoFooters'), ['errorField' => 'po_footer_id']);

        return $rules;
    }
}
