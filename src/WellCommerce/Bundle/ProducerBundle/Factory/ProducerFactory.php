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

namespace WellCommerce\Bundle\ProducerBundle\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use WellCommerce\Bundle\CoreBundle\Factory\AbstractFactory;
use WellCommerce\Bundle\ProducerBundle\Entity\ProducerInterface;

/**
 * Class ProducerFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProducerFactory extends AbstractFactory
{
    /**
     * @var string
     */
    protected $supportsInterface = ProducerInterface::class;

    /**
     * @return ProducerInterface
     */
    public function create()
    {
        /** @var  $producer ProducerInterface */
        $producer = $this->init();
        $producer->setDeliverers(new ArrayCollection());
        $producer->setPhoto(null);
        $producer->setShops(new ArrayCollection());

        return $producer;
    }
}
