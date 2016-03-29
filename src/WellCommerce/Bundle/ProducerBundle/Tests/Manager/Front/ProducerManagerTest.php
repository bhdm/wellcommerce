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

namespace WellCommerce\Bundle\ProducerBundle\Tests\Manager\Front;

use WellCommerce\Bundle\CoreBundle\Test\Manager\Front\AbstractFrontManagerTestCase;

/**
 * Class ProducerManagerTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProducerManagerTest extends AbstractFrontManagerTestCase
{
    protected function get()
    {
        return $this->container->get('producer.manager.front');
    }

    protected function getServiceClassName()
    {
        return \WellCommerce\Bundle\ProducerBundle\Manager\Front\ProducerManager::class;
    }

    protected function getRepositoryInterfaceName()
    {
        return \WellCommerce\Bundle\ProducerBundle\Repository\ProducerRepositoryInterface::class;
    }
}
