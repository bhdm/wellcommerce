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

namespace WellCommerce\Bundle\CouponBundle\Manager\Front;

use WellCommerce\Bundle\CoreBundle\Manager\Front\AbstractFrontManager;
use WellCommerce\Bundle\CouponBundle\Checker\CouponCheckerInterface;
use WellCommerce\Bundle\CouponBundle\Entity\CouponInterface;
use WellCommerce\Bundle\CouponBundle\Exception\CouponException;

/**
 * Class CouponManager
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class CouponManager extends AbstractFrontManager
{
    /**
     * @var CouponCheckerInterface
     */
    protected $couponChecker;

    /**
     * @param CouponCheckerInterface $couponChecker
     */
    public function setCouponChecker(CouponCheckerInterface $couponChecker)
    {
        $this->couponChecker = $couponChecker;
    }

    /**
     * @param CouponInterface|null $coupon
     *
     * @return bool
     * @throws CouponException
     */
    public function useCoupon(CouponInterface $coupon = null)
    {
        if (!$this->couponChecker->isValid($coupon)) {
            throw new CouponException($this->couponChecker->getError());
        }

        $this->applyCartCoupon($coupon);

        return true;
    }

    /**
     * Applies coupon on cart
     *
     * @param CouponInterface $coupon
     */
    protected function applyCartCoupon(CouponInterface $coupon)
    {
        $cart = $this->getCartContext()->getCurrentCart();
        $cart->setCoupon($coupon);
        $this->updateResource($cart);
    }

    /**
     * Removes coupon from cart
     */
    public function removeCartCoupon()
    {
        $cart = $this->getCartContext()->getCurrentCart();
        $cart->setCoupon(null);
        $this->updateResource($cart);
    }
}
