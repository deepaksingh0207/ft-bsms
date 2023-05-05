<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PoItemSchedule Entity
 *
 * @property int $id
 * @property int $po_header_id
 * @property int $po_footer_id
 * @property string $actual_qty
 * @property string $received_qty
 * @property \Cake\I18n\FrozenTime $delivery_date
 * @property int $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\PoHeader $po_header
 * @property \App\Model\Entity\PoFooter $po_footer
 */
class PoItemSchedule extends Entity
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
        'id' => true,
        'po_header_id' => true,
        'po_footer_id' => true,
        'actual_qty' => true,
        'received_qty' => true,
        'delivery_date' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'po_header' => true,
        'po_footer' => true,
    ];
}
