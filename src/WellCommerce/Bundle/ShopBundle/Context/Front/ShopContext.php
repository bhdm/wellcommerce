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

namespace WellCommerce\Bundle\ShopBundle\Context\Front;

use WellCommerce\Bundle\ShopBundle\Context\AbstractShopContext;
use WellCommerce\Bundle\ShopBundle\Context\ShopContextInterface;

/**
 * Class ShopContext
 *
 * @author Adam Piotrowski <adam@wellcommerce.org>
 */
class ShopContext extends AbstractShopContext implements ShopContextInterface
{
    const SHOP_CONTEXT_SESSION_ATTRIBUTE = 'front/shop/id';

    /**
     * {@inheritdoc}
     */
    public function getSessionAttributeName()
    {
        return self::SHOP_CONTEXT_SESSION_ATTRIBUTE;
    }
}
