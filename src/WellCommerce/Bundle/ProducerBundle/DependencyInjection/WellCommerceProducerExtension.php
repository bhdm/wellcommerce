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

namespace WellCommerce\Bundle\ProducerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WellCommerce\Bundle\CoreBundle\DependencyInjection\AbstractExtension;

/**
 * Class WellCommerceProducerExtension
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class WellCommerceProducerExtension extends AbstractExtension
{
    CONST EXTENSION_NAME = 'well_commerce_producer';

    /**
     * {@inheritdoc}
     */
    protected function setExtensionConfiguration(ContainerBuilder $container, array $parameters = [])
    {
        $container->setParameter(self::EXTENSION_NAME, $parameters);
    }
}
