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

namespace WellCommerce\Bundle\CartBundle\Exception;

/**
 * Class ChangeCartItemQuantityException
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ChangeCartItemQuantityException extends \RuntimeException
{
    /**
     * Constructor
     *
     * @param string $id Cart item id
     */
    public function __construct($id)
    {
        parent::__construct(sprintf('Cannot change item "%s" quantity on cart', $id));
    }
}
