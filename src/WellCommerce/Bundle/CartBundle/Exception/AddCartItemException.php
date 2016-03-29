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

use WellCommerce\Bundle\ProductBundle\Entity\ProductAttributeInterface;
use WellCommerce\Bundle\ProductBundle\Entity\ProductInterface;

/**
 * Class AddCartItemException
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class AddCartItemException extends \RuntimeException
{
    public function __construct(ProductInterface $product, ProductAttributeInterface $attribute = null, $quantity, \Exception $previous)
    {
        $message = sprintf(
            'Cannot add item with id: "%s", attribute: "%s" and quantity: "%s" to cart',
            $product->getId(),
            (null === $attribute) ? 0 : $attribute->getId(),
            $quantity
        );

        parent::__construct($message, $previous->getCode(), $previous);
    }
}
