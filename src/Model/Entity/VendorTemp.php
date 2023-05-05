<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendorTemp Entity
 *
 * @property int $id
 * @property int $purchasing_organization_id
 * @property int $account_group_id
 * @property int $schema_group_id
 * @property string $name
 * @property string|null $address
 * @property string|null $city
 * @property string|null $pincode
 * @property string $mobile
 * @property string $email_id
 * @property string|null $country
 * @property string $payment_term
 * @property string $order_currency
 * @property string|null $gst_no
 * @property string|null $pan_no
 * @property string|null $contact_person
 * @property string|null $contact_email_id
 * @property string|null $contact_mobile
 * @property string|null $cin_no
 * @property string|null $tan_no
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $valid_date
 * @property int $buyer_id
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\PurchasingOrganization $purchasing_organization
 * @property \App\Model\Entity\AccountGroup $account_group
 * @property \App\Model\Entity\SchemaGroup $schema_group
 */
class VendorTemp extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'purchasing_organization_id' => true,
        'account_group_id' => true,
        'schema_group_id' => true,
        'sap_vendor_code' => true,
        'name' => true,
        'address' => true,
        'city' => true,
        'pincode' => true,
        'mobile' => true,
        'email' => true,
        'country' => true,
        'payment_term' => true,
        'order_currency' => true,
        'gst_no' => true,
        'pan_no' => true,
        'contact_person' => true,
        'contact_email' => true,
        'contact_mobile' => true,
        'cin_no' => true,
        'tan_no' => true,
        'status' => true,
        'valid_date' => true,
        'buyer_id' => true,
        'added_date' => true,
        'updated_date' => true,
        'purchasing_organization' => true,
        'account_group' => true,
        'schema_group' => true,
        'remark' => true
    ];
}
