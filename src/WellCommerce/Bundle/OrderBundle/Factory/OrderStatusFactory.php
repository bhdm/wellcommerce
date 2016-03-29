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

namespace WellCommerce\Bundle\OrderBundle\Factory;

use WellCommerce\Bundle\CoreBundle\Factory\AbstractFactory;
use WellCommerce\Bundle\OrderBundle\Entity\OrderStatusInterface;

/**
 * Class OrderStatusFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class OrderStatusFactory extends AbstractFactory
{
    /**
     * @var string
     */
    protected $supportsInterface = OrderStatusInterface::class;

    /**
     * @return OrderStatusInterface
     */
    public function create()
    {
        /** @var  $status OrderStatusInterface */
        $status = $this->init();
        $status->setEnabled(true);

        return $status;
    }
}
