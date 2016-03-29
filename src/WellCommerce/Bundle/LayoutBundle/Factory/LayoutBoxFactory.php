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

namespace WellCommerce\Bundle\LayoutBundle\Factory;

use WellCommerce\Bundle\CoreBundle\Factory\AbstractFactory;
use WellCommerce\Bundle\LayoutBundle\Entity\LayoutBoxInterface;

/**
 * Class LayoutBoxFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class LayoutBoxFactory extends AbstractFactory
{
    /**
     * @var string
     */
    protected $supportsInterface = LayoutBoxInterface::class;

    /**
     * @return LayoutBoxInterface
     */
    public function create()
    {
        /** @var $box LayoutBoxInterface */
        $box = $this->init();

        return $box;
    }
}
