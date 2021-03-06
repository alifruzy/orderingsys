<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $menu_id
 * @property int $quantity
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property int $status_id
 *
 * @property \App\Model\Entity\Menu $menu
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Delivery[] $deliveries
 */
class Order extends Entity
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
        'menu_id' => true,
        'quantity' => true,
        'user_id' => true,
        'created' => true,
        'status_id' => true,
        'menu' => true,
        'user' => true,
        'status' => true,
        'deliveries' => true
    ];
}
