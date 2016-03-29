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

namespace WellCommerce\Bundle\ThemeBundle\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use WellCommerce\Bundle\CoreBundle\Factory\AbstractFactory;
use WellCommerce\Bundle\ThemeBundle\Entity\ThemeInterface;

/**
 * Class ThemeFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ThemeFactory extends AbstractFactory
{
    /**
     * @var string
     */
    protected $supportsInterface = ThemeInterface::class;

    /**
     * @return ThemeInterface
     */
    public function create()
    {
        /** @var  $theme ThemeInterface */
        $theme = $this->init();
        $theme->setCss(new ArrayCollection());
        $theme->setName('');

        return $theme;
    }
}
