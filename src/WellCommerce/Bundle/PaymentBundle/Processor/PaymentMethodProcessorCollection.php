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

namespace WellCommerce\Bundle\PaymentBundle\Processor;

use WellCommerce\Component\Collections\ArrayCollection;

/**
 * Class PaymentMethodProcessorCollection
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class PaymentMethodProcessorCollection extends ArrayCollection
{
    /**
     * @param PaymentMethodProcessorInterface $processor
     */
    public function add(PaymentMethodProcessorInterface $processor)
    {
        $this->items[$processor->getAlias()] = $processor;
    }

    /**
     * @return PaymentMethodProcessorInterface[]
     */
    public function all()
    {
        return $this->items;
    }
}
