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

namespace WellCommerce\Bundle\CartBundle\Manager\Front;

use WellCommerce\Bundle\CartBundle\Entity\CartInterface;
use WellCommerce\Bundle\CartBundle\Entity\CartProductInterface;
use WellCommerce\Bundle\CoreBundle\Manager\Front\FrontManagerInterface;
use WellCommerce\Bundle\ProductBundle\Entity\ProductAttributeInterface;
use WellCommerce\Bundle\ProductBundle\Entity\ProductInterface;

/**
 * Interface CartManagerInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface CartManagerInterface extends FrontManagerInterface
{
    /**
     * Adds new product to cart
     *
     * @param ProductInterface          $product
     * @param ProductAttributeInterface $attribute
     * @param int                       $quantity
     *
     * @return bool
     */
    public function addProductToCart(ProductInterface $product, ProductAttributeInterface $attribute = null, $quantity = 1);

    /**
     * Deletes the item from cart
     *
     * @param int $id
     *
     * @return bool
     */
    public function deleteCartProduct(CartProductInterface $cartProduct);

    /**
     * Changes item quantity on cart
     *
     * @param int $id
     * @param int $qty
     *
     * @return bool
     */
    public function changeCartProductQuantity(CartProductInterface $cartProduct, $qty);

    /**
     * Initializes the cart for current request
     *
     * @return CartInterface
     */
    public function initializeCart();

    /**
     * Clears and reinitializes the cart
     *
     * @param CartInterface $cart
     */
    public function abandonCart(CartInterface $cart);
}
