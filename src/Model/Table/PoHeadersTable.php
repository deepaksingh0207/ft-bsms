<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PoHeaders Model
 *
 * @property \App\Model\Table\PoFootersTable&\Cake\ORM\Association\HasMany $PoFooters
 *
 * @method \App\Model\Entity\PoHeader newEmptyEntity()
 * @method \App\Model\Entity\PoHeader newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PoHeader[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PoHeader get($primaryKey, $options = [])
 * @method \App\Model\Entity\PoHeader findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PoHeader patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PoHeader[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PoHeader|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PoHeader saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PoHeader[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PoHeader[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PoHeader[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PoHeader[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PoHeadersTable extends Table
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

        $this->setTable('po_headers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('PoFooters', [
            'foreignKey' => 'po_header_id',
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
            ->scalar('sap_vendor_code')
            ->maxLength('sap_vendor_code', 10)
            ->requirePresence('sap_vendor_code', 'create')
            ->notEmptyString('sap_vendor_code');

        $validator
            ->scalar('po_no')
            ->maxLength('po_no', 10)
            ->requirePresence('po_no', 'create')
            ->notEmptyString('po_no');

        $validator
            ->scalar('document_type')
            ->maxLength('document_type', 4)
            ->requirePresence('document_type', 'create')
            ->notEmptyString('document_type');

        $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmptyDateTime('created_on');

        $validator
            ->scalar('created_by')
            ->maxLength('created_by', 12)
            ->requirePresence('created_by', 'create')
            ->notEmptyString('created_by');

        $validator
            ->scalar('pay_terms')
            ->maxLength('pay_terms', 40)
            ->requirePresence('pay_terms', 'create')
            ->notEmptyString('pay_terms');

        $validator
            ->scalar('currency')
            ->maxLength('currency', 3)
            ->requirePresence('currency', 'create')
            ->notEmptyString('currency');

        $validator
            ->decimal('exchange_rate')
            ->requirePresence('exchange_rate', 'create')
            ->notEmptyString('exchange_rate');

        $validator
            ->scalar('release_status')
            ->maxLength('release_status', 10)
            ->requirePresence('release_status', 'create')
            ->notEmptyString('release_status');

        $validator
            ->dateTime('added_date')
            ->notEmptyDateTime('added_date');

        $validator
            ->dateTime('updated_date')
            ->notEmptyDateTime('updated_date');

        return $validator;
    }
}
