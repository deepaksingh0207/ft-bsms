<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RfqInquiry Entity
 *
 * @property int $id
 * @property int $rfq_id
 * @property int $seller_id
 * @property string|null $qty
 * @property string|null $rate
 * @property string $discount
 * @property string $sub_total
 * @property \Cake\I18n\FrozenDate|null $delivery_date
 * @property array|null $inquiry_data
 * @property bool|null $inquiry
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime $updated_date
 * @property string|null $neg_rate
 *
 * @property \App\Model\Entity\BuyerSellerUser $buyer_seller_user
 */
class RfqInquiry extends Entity
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
        'rfq_id' => true,
        'seller_id' => true,
        'qty' => true,
        'rate' => true,
        'discount' => true,
        'sub_total' => true,
        'delivery_date' => true,
        'inquiry_data' => true,
        'inquiry' => true,
        'created_date' => true,
        'updated_date' => true,
        'neg_rate' => true,
        'buyer_seller_user' => true,
    ];
}
