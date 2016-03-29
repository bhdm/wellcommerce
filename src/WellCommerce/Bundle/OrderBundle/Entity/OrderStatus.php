<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */
namespace WellCommerce\Bundle\OrderBundle\Entity;

use Knp\DoctrineBehaviors\Model\Blameable\Blameable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use WellCommerce\Bundle\AppBundle\Doctrine\ORM\Behaviours\EnableableTrait;

/**
 * Class OrderStatus
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class OrderStatus implements OrderStatusInterface
{
    use Timestampable;
    use Blameable;
    use Translatable;
    use EnableableTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var OrderStatusGroupInterface
     */
    protected $orderStatusGroup;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderStatusGroup()
    {
        return $this->orderStatusGroup;
    }

    /**
     * {@inheritdoc}
     */
    public function setOrderStatusGroup(OrderStatusGroupInterface $orderStatusGroup)
    {
        $this->orderStatusGroup = $orderStatusGroup;
    }
}
