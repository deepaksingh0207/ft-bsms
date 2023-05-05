<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendorMaterialStock Entity
 *
 * @property int $id
 * @property string $sap_vendor_code
 * @property string|null $material
 * @property string $part_code
 * @property string|null $material_desc
 * @property string $current_stock
 * @property string $production_stock
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $updated_date
 */
class VendorMaterialStock extends Entity
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
        'sap_vendor_code' => true,
        'material' => true,
        'part_code' => true,
        'material_desc' => true,
        'current_stock' => true,
        'production_stock' => true,
        'status' => true,
        'added_date' => true,
        'updated_date' => true,
    ];
}
