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

namespace WellCommerce\Bundle\AttributeBundle\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use WellCommerce\Bundle\AttributeBundle\Entity\AttributeGroupInterface;
use WellCommerce\Bundle\CoreBundle\Factory\AbstractFactory;

/**
 * Class AttributeGroupFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class AttributeGroupFactory extends AbstractFactory
{
    /**
     * @var string
     */
    protected $supportsInterface = AttributeGroupInterface::class;

    /**
     * @return AttributeGroupInterface
     */
    public function create()
    {
        /** @var $group AttributeGroupInterface */
        $group = $this->init();
        $group->setAttributes(new ArrayCollection());

        return $group;
    }
}
