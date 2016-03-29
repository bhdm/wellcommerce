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

namespace WellCommerce\Bundle\OrderBundle\Visitor;

use WellCommerce\Bundle\OrderBundle\Entity\OrderInterface;

/**
 * Interface OrderVisitorInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface OrderVisitorInterface
{
    /**
     * @param OrderInterface $order
     */
    public function visitOrder(OrderInterface $order);

    /**
     * @return int
     */
    public function getPriority();

    /**
     * @return string
     */
    public function getAlias();
}
