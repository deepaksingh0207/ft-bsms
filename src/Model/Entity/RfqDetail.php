<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RfqDetail Entity
 *
 * @property int $id
 * @property int $buyer_seller_user_id
 * @property int $product_id
 * @property int $product_sub_category_id
 * @property array $attribute_data
 * @property string $description
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\BuyerSellerUser $buyer_seller_user
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\ProductSubCategory $product_sub_category
 */
class RfqDetail extends Entity
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
        'buyer_seller_user_id' => true,
        'rfq_no' => true,
        'product_id' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'product_sub_category_id' => true,
        'qty' => true,
        'part_name' => true,
        'uom_code' => true,
        'remarks' => true,
        'make' => true,
        'uploaded_files' => true
    ];
}
