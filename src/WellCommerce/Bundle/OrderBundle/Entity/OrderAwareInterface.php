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

/**
 * Interface OrderAwareInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface OrderAwareInterface
{
    /**
     * @param OrderInterface $order
     */
    public function setOrder(OrderInterface $order);

    /**
     * @return OrderInterface
     */
    public function getOrder();
}
