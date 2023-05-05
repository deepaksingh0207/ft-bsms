<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendorTempOtps Model
 *
 * @property \App\Model\Table\VendorTempsTable&\Cake\ORM\Association\BelongsTo $VendorTemps
 *
 * @method \App\Model\Entity\VendorTempOtp newEmptyEntity()
 * @method \App\Model\Entity\VendorTempOtp newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VendorTempOtp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendorTempOtp get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendorTempOtp findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VendorTempOtp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendorTempOtp[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendorTempOtp|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorTempOtp saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendorTempOtp[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorTempOtp[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorTempOtp[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VendorTempOtp[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendorTempOtpsTable extends Table
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

        $this->setTable('vendor_temp_otps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('VendorTemps', [
            'foreignKey' => 'vendor_temp_id',
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
            ->integer('vendor_temp_id')
            ->requirePresence('vendor_temp_id', 'create')
            ->notEmptyString('vendor_temp_id');

        $validator
            ->scalar('otp')
            ->maxLength('otp', 6)
            ->requirePresence('otp', 'create')
            ->notEmptyString('otp');

        $validator
            ->dateTime('expire_date')
            ->requirePresence('expire_date', 'create')
            ->notEmptyDateTime('expire_date');

        $validator
            ->boolean('verified')
            ->notEmptyString('verified');

        $validator
            ->dateTime('added_date')
            ->notEmptyDateTime('added_date');

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
        $rules->add($rules->existsIn('vendor_temp_id', 'VendorTemps'), ['errorField' => 'vendor_temp_id']);

        return $rules;
    }
}
