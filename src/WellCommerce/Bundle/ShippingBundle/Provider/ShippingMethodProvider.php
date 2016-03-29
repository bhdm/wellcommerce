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

namespace WellCommerce\Bundle\ShippingBundle\Provider;

use WellCommerce\Bundle\PaymentBundle\Entity\PaymentMethodInterface;
use WellCommerce\Bundle\ShippingBundle\Calculator\ShippingCalculatorSubjectInterface;
use WellCommerce\Bundle\ShippingBundle\Entity\ShippingMethodCost;
use WellCommerce\Bundle\ShippingBundle\Entity\ShippingMethodCostInterface;

/**
 * Class ShippingMethodProvider
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ShippingMethodProvider extends AbstractShippingMethodProvider implements ShippingMethodProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getShippingMethodCostsCollection(ShippingCalculatorSubjectInterface $subject)
    {
        if (null === $this->collection) {
            $this->collection = $this->getCollection($subject);
        }

        return $this->sortCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingMethodOptions(ShippingCalculatorSubjectInterface $subject)
    {
        $shippingMethodsCollection = $this->getShippingMethodCostsCollection($subject);
        $options                   = [];

        $shippingMethodsCollection->map(function (ShippingMethodCost $shippingMethodCost) use (&$options) {
            $shippingMethod = $shippingMethodCost->getShippingMethod();

            $options[$shippingMethod->getId()] = $shippingMethod->translate()->getName();
        });

        return $options;
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingMethodsPaymentOptions(ShippingCalculatorSubjectInterface $subject)
    {
        $shippingMethodsCollection = $this->getShippingMethodCostsCollection($subject);
        $options                   = [];

        $shippingMethodsCollection->map(function (ShippingMethodCostInterface $shippingMethodCost) use (&$options) {
            $shippingMethod = $shippingMethodCost->getShippingMethod();
            $collection     = $shippingMethod->getPaymentMethods();

            $collection->map(function (PaymentMethodInterface $paymentMethod) use (&$options) {
                $options[$paymentMethod->getId()] = $paymentMethod->translate()->getName();
            });
        });

        return $options;
    }
}
