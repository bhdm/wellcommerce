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

namespace WellCommerce\Bundle\CurrencyBundle\Entity;

use WellCommerce\Bundle\CoreBundle\Entity\BlameableInterface;
use WellCommerce\Bundle\CoreBundle\Entity\TimestampableInterface;

/**
 * Interface CurrencyInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface CurrencyInterface extends TimestampableInterface, BlameableInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @param string $code
     */
    public function setCode($code);

    /**
     * @return string
     */
    public function getCode();
}
