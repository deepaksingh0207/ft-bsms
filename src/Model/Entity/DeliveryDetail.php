<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DeliveryDetail Entity
 *
 * @property int $id
 * @property int $po_header_id
 * @property int $po_footer_id
 * @property string $challan_no
 * @property string $qty
 * @property string $eway_bill_no
 * @property string $einvoice_no
 * @property string|resource|null $challan_document
 * @property string $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 *
 * @property \App\Model\Entity\PoHeader $po_header
 * @property \App\Model\Entity\PoFooter $po_footer
 */
class DeliveryDetail extends Entity
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
        'po_footer_id' => true,
        'challan_no' => true,
        'qty' => true,
        'eway_bill_no' => true,
        'einvoice_no' => true,
        'challan_document' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
        'po_header' => true,
        'po_footer' => true,
    ];
}
