<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deal Entity.
 *
 * @property int $id
 * @property string $title
 * @property string $photo
 * @property string $photo_dir
 * @property string $description
 * @property float $actual_price
 * @property float $promo_price
 * @property float $saved_amount
 * @property int $discount_percentage
 * @property int $purchased_number
 * @property \Cake\I18n\Time $deals_start_date
 * @property \Cake\I18n\Time $deals_end_date
 * @property \Cake\I18n\Time $redeem_start_date
 * @property \Cake\I18n\Time $redeem_end_date
 * @property string $additional_info
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $status
 * @property int $percentage_of_rebate
 * @property int $users_id
 * @property \App\Model\Entity\User $user
 * @property int $categories_id
 * @property \App\Model\Entity\Merchant[] $merchants
 */
class Deal extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
