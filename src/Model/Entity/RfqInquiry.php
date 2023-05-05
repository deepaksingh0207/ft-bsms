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
 * @property bool|null $inquiry
 * @property \Cake\I18n\FrozenTime $created_date
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
        'inquiry' => true,
        'created_date' => true,
    ];
}
