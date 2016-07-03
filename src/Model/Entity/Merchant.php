<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Merchant Entity.
 *
 * @property int $id
 * @property $photo
 * @property string $photo_dir
 * @property string $company_name
 * @property string $description
 * @property string $address
 * @property string $website
 * @property string $email
 * @property string $phone
 * @property string $longitude
 * @property string $latitude
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Merchant extends Entity
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
