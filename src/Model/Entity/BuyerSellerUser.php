<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BuyerSellerUser Entity
 *
 * @property int $id
 * @property string $user_type
 * @property string $username
 * @property string $password
 * @property string $company_name
 * @property string $address
 * @property string $cities
 * @property string $email_id
 * @property string $contact
 * @property string $alt_contact
 * @property string $business_type
 * @property string $product_deals
 * @property int $is_verified
 * @property int $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 */
class BuyerSellerUser extends Entity
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
        'user_type' => true,
        'username' => true,
        'password' => true,
        'company_name' => true,
        'address' => true,
        'cities' => true,
        'email' => true,
        'contact' => true,
        'alt_contact' => true,
        'business_type' => true,
        'is_verified' => true,
        'TIN' => true,
        'GST' => true,
        'tin_verified' => true,
        'gst_verified' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'product_deals' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
}
