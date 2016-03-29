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

namespace WellCommerce\Bundle\AdminBundle\Factory;

use WellCommerce\Bundle\AdminBundle\Entity\UserGroupInterface;
use WellCommerce\Bundle\CoreBundle\Factory\AbstractFactory;

/**
 * Class UserGroupFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class UserGroupFactory extends AbstractFactory
{
    /**
     * @var string
     */
    protected $supportsInterface = UserGroupInterface::class;

    /**
     * @return UserGroupInterface
     */
    public function create()
    {
        $group = $this->init();

        return $group;
    }
}
