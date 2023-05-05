<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendorTemps Model
 *
 * @property \App\Model\Table\PurchasingOrganizationsTable&\Cake\ORM\Association\BelongsTo $PurchasingOrganizations
 * @property \App\Model\Table\AccountGroupsTable&\Cake\ORM\Association\BelongsTo $AccountGroups
 * @property \App\Model\Table\SchemaGroupsTable&\Cake\ORM\Association\BelongsTo $SchemaGroups
 *
 * @method \App\Model\Entity\VendorTemp newEmptyEntity()
 * @method \App\Model\Entity\VendorTemp newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VendorTemp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorTemp get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorTemp findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VendorTemp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorTemp[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorTemp|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorTemp saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorTemp[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorTemp[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorTemp[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorTemp[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendorTempsTable extends Table
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

        $this->setTable('vendor_temps');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('PurchasingOrganizations', [
            'foreignKey' => 'purchasing_organization_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('AccountGroups', [
            'foreignKey' => 'account_group_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SchemaGroups', [
            'foreignKey' => 'schema_group_id',
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
            ->integer('purchasing_organization_id')
            ->requirePresence('purchasing_organization_id', 'create')
            ->notEmptyString('purchasing_organization_id');

        $validator
            ->integer('account_group_id')
            ->requirePresence('account_group_id', 'create')
            ->notEmptyString('account_group_id');

        $validator
            ->integer('schema_group_id')
            ->requirePresence('schema_group_id', 'create')
            ->notEmptyString('schema_group_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address');

        $validator
            ->scalar('city')
            ->maxLength('city', 50)
            ->allowEmptyString('city');

        $validator
            ->scalar('pincode')
            ->maxLength('pincode', 6)
            ->allowEmptyString('pincode');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 12)
            ->requirePresence('mobile', 'create')
            ->notEmptyString('mobile');

        $validator
            ->scalar('email')
            ->maxLength('email', 100)
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('country')
            ->maxLength('country', 50)
            ->allowEmptyString('country');

        $validator
            ->scalar('payment_term')
            ->requirePresence('payment_term', 'create')
            ->notEmptyString('payment_term');

        $validator
            ->scalar('gst_no')
            ->maxLength('gst_no', 20)
            ->allowEmptyString('gst_no');

        $validator
            ->scalar('pan_no')
            ->maxLength('pan_no', 20)
            ->allowEmptyString('pan_no');

        $validator
            ->scalar('contact_person')
            ->maxLength('contact_person', 50)
            ->allowEmptyString('contact_person');

        $validator
            ->scalar('contact_email')
            ->maxLength('contact_email', 50)
            ->allowEmptyString('contact_email');

        $validator
            ->scalar('contact_mobile')
            ->maxLength('contact_mobile', 12)
            ->allowEmptyString('contact_mobile');

        $validator
            ->scalar('cin_no')
            ->maxLength('cin_no', 25)
            ->allowEmptyString('cin_no');

        $validator
            ->scalar('tan_no')
            ->maxLength('tan_no', 25)
            ->allowEmptyString('tan_no');


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
        $rules->add($rules->existsIn('purchasing_organization_id', 'PurchasingOrganizations'), ['errorField' => 'purchasing_organization_id']);
        $rules->add($rules->existsIn('account_group_id', 'AccountGroups'), ['errorField' => 'account_group_id']);
        $rules->add($rules->existsIn('schema_group_id', 'SchemaGroups'), ['errorField' => 'schema_group_id']);

        return $rules;
    }
}
