<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PoFooter Entity
 *
 * @property int $id
 * @property int $po_header_id
 * @property string $item
 * @property string $deleted_indication
 * @property string $material
 * @property string $short_text
 * @property string $po_qty
 * @property string $grn_qty
 * @property string $pending_qty
 * @property string $order_unit
 * @property string $net_price
 * @property string $price_unit
 * @property string $net_value
 * @property string $gross_value
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\PoHeader $po_header
 */
class PoFooter extends Entity
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
        'po_header_id' => true,
        'item' => true,
        'deleted_indication' => true,
        'material' => true,
        'short_text' => true,
        'po_qty' => true,
        'grn_qty' => true,
        'pending_qty' => true,
        'order_unit' => true,
        'net_price' => true,
        'price_unit' => true,
        'net_value' => true,
        'gross_value' => true,
        'added_date' => true,
        'updated_date' => true,
        'po_header' => true,
        'part_code' => true,
        'stock' => true,
    ];
}
