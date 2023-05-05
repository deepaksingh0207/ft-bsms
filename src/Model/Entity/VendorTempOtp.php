<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendorTempOtp Entity
 *
 * @property int $id
 * @property int $vendor_temp_id
 * @property string $otp
 * @property \Cake\I18n\FrozenTime $expire_date
 * @property bool $verified
 * @property \Cake\I18n\FrozenTime $added_date
 *
 * @property \App\Model\Entity\VendorTemp $vendor_temp
 */
class VendorTempOtp extends Entity
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
        'vendor_temp_id' => true,
        'otp' => true,
        'expire_date' => true,
        'verified' => true,
        'added_date' => true,
        'vendor_temp' => true,
    ];
}
